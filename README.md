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
Date: Tue, 17 May 2022 08:36:39 GMT
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 55
Access-Control-Allow-Origin: *

[
  {
    "chain length": "5"
  },
  {
    "transaction": 1652776394,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776395,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776396,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776397,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776398,
    "guess number": 50,
    "status": "OK"
  },
  {
    "chain length": "5"
  },
  {
    "transaction": 1652776478,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776479,
    "guess number": 50,
    "status": "Failed"
  },
  "Aborted",
  "Aborted",
  "Aborted",
  {
    "chain length": "5"
  },
  {
    "transaction": 1652776525,
    "guess number": 50,
    "status": "OK"
  },
  {
    "transaction": 1652776526,
    "guess number": 50,
    "status": "Failed"
  },
  "Aborted",
  "Aborted",
  "Aborted",
  {
    "chain length": "2"
  },
  {
    "transaction": 1652776570,
    "guess number": 51,
    "status": "OK"
  },
  {
    "transaction": 1652776571,
    "guess number": 51,
    "status": "OK"
  },
  {
    "chain length": "5"
  },
  {
    "transaction": 1652776610,
    "guess number": 32,
    "status": "Failed"
  },
  "Aborted",
  "Aborted",
  "Aborted",
  "Aborted"
]

Response code: 200 (OK); Time: 259ms; Content length: 926 bytes

```
