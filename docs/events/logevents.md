# Events: LogEvents

Events which are logged.

| Subscription (method)             | Event             | Priority |
|-----------------------------------|-------------------|----------|
| [addRequestInfo](#addrequestinfo) | `app.http`        | 10       |
| [logException](#logexception)     | `bones.exception` | 10       |

## addRequestInfo

Adds URL, HTTP method and IP of all HTTP request to log extra array.

## logException

Log exceptions which are not an instance of `HttpException`.