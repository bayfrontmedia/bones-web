# Filters: Locale

Locale-related filters.

| Subscriber (method)                     | Filter                | Priority |
|-----------------------------------------|-----------------------|----------|
| [addLocaleToPrefix](#addlocaletoprefix) | `router.route_prefix` | 10       |
 | [addLocaleArray](#addlocalearray)       | `veil.data`           | 10       |

## addLocaleToPrefix

Add locale to route prefix if enabled.

## addLocaleArray

Add locale values to the `$data` array.

```php
'locale' => [
    'all' => App::getConfig('app.locale.valid', []),
    'current' => $this->translate->getLocale()
]
```