# Filters: Views

View-related filters.

| Subscriber (method)         | Filter          | Priority |
|-----------------------------|-----------------|----------|
| [addData](#adddata)         | `veil.data`     | 5        |
| [addTagRoute](#addtagroute) | `response.body` | 5        |
| [addTagSay](#addtagsay)     | `response.body` | 5        |

## addData

Add data to the `$data` array.

## addTagRoute

Add support for the `@route:` template tag which returns the URL of any named route.

## addTagSay

Add support for the `@say:` template tag which returns the translation of a given string.