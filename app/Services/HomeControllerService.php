<?php


namespace App\Services;


use App\Http\Resources\LogsResource;
use App\Jobs\GuessJob;
use App\Models\Log;
use App\Models\Param;
use Illuminate\Support\Facades\Bus;

class HomeControllerService implements HomeControllerServiceInterface
{

    public function show($request)
    {
        if ($request->has('transaction')) {
            return LogsResource::collection(Log::where('transaction', '=', $request->get('transaction'))->get());
        }
        return LogsResource::collection(Log::all());
    }

    public function start($request)
    {
        $args = [];
        $chain = [];

        $args['backoff'] = $request->backoff ?? config('guessjob.backoff', 0);
        $args['tries'] = $request->tries ?? config('guessjob.tries', 100);
        $args['guessNumber'] = $request->guess_number ?? config('guessjob.guessNumber', 50);
        $args['range'] =
            [
                'start' => $request->range['start'] ?? config('guessjob.rangeStart', 0),
                'end' => $request->range['end'] ?? config('guessjob.rangeEnd', 100),
            ];

        $args['chainLength'] = $request->chain ?? config('guessjob.chainLength', 2);

        for ($i = 1; $i <= $args['chainLength']; $i++) {
            $chain[] = new GuessJob($args);
        }

        Bus::chain($chain)->dispatch();

        $result = ' Args:';
        array_walk_recursive($args, function ($item, $key) use (&$result) {
            $result .= ' ' . $key . ' = ' . $item;
        });

        return response('Started, ' . $result ?? '', 200);
    }

    public function clear()
    {
        Param::where('id', '>', 0)->delete();
        return response('Cleared', 200);
    }

    public function total()
    {
        $total = Log::all();
        $transactions = $total->pluck('transaction')->unique();
        $result = [];
        $transactions->each(function ($item, $key) use (&$result, $total) {
            $result[] = [
                'transaction' => $item,
                'guess number' => $total->whereIn('transaction', $item)->pluck('guessNumber')->first(),
                'status' => $total->whereIn('transaction', $item)->pluck('status')->last(),
                'used tries' => $total->whereIn('transaction', $item)->count(),
                'params' => json_decode($total->where('transaction', '=', $item)->first()->param->params),
                'start date' => $total->where('transaction', '=', $item)->first()->param->startDateTime,
                'end date' => $total->where('transaction', '=', $item)->first()->param->endDateTime,
                'completion time' => $total->where('transaction', '=', $item)->first()->param->completionTime,
            ];

        });

        return $result;
    }

    public function result()
    {
        $result = [];
        $param = Param::all();

        $param->each(function ($item, $key) use (&$result) {
            $result[] = [
                'chain length' => json_decode($item->params, true)['chainLength']
            ];

            $statusOkItem = $item->logs->filter(function ($item, $key) {
                return $item['status'] === 'OK';
            });

            if (sizeof($statusOkItem) > 0) {
                $result[] = [
                    'transaction' => $statusOkItem->first()->transaction,
                    'status' => 'OK'
                ];
            } else {
                $statusFailedItem = $item->logs->filter(function ($item, $key) {
                    return $item['status'] === 'Failed';
                });
                if (sizeof($statusFailedItem) > 0) {
                    $result[] = [
                        'transaction' => $statusFailedItem->first()->transaction,
                        'status' => 'Failed'
                    ];
                } else {
                    $result[] = 'Aborted';
                }
            }
        });

        return $result;
    }
}
