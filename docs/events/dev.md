# Events: Dev

Actions to perform when environment = `dev`.

| Subscriber (method)       | Event           | Priority |
|---------------------------|-----------------|----------|
| [logDevMode](#logdevmode) | `app.bootstrap` | 5        |


## logDevMode

Add a log entry with level `debug` to notify that Bones is operating in dev mode.