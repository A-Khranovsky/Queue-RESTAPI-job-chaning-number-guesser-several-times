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
Date: Mon, 16 May 2022 15:35:58 GMT
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *

[
  {
    "chain length": "4"
  },
  {
    "transaction": 1652713086,
    "status": "OK"
  },
  {
    "chain length": "4"
  },
  {
    "transaction": 1652713087,
    "status": "Failed"
  },
  {
    "chain length": "4"
  },
  "Aborted",
  {
    "chain length": "4"
  },
  "Aborted",
  {
    "chain length": "2"
  },
  {
    "transaction": 1652714242,
    "status": "OK"
  },
  {
    "chain length": "2"
  },
  {
    "transaction": 1652714243,
    "status": "OK"
  }
]

Response code: 200 (OK); Time: 307ms; Content length: 315 bytes


```
