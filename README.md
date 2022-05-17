```
The description is expected

GET http://localhost:80/api/result

HTTP/1.1 200 OK
Server: nginx/1.21.6
Content-Type: application/json
Transfer-Encoding: chunked
Connection: keep-alive
X-Powered-By: PHP/8.0.2
Cache-Control: no-cache, private
Date: Tue, 17 May 2022 08:16:47 GMT
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 57
Access-Control-Allow-Origin: *

[
  {
    "chain length": "2"
  },
  {
    "transaction": 1652775084,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652775085,
    "guess number": 50,
    "status": "OK"
  },
  {
    "chain length": "4"
  },
  {
    "transaction": 1652775117,
    "guess number": 50,
    "status": "Failed"
  },
  "Aborted",
  "Aborted",
  "Aborted"
]

Response code: 200 (OK); Time: 312ms; Content length: 254 bytes

```
