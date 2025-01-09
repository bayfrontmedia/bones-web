# Filters

The app filter subscribers are located at `/app/Filters`.

Bones filters documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/services/filters.md).

## Supported filters

In addition to any [filters included with Bones](https://github.com/bayfrontmedia/bones/blob/dev/docs/services/filters.md#filters), 
this app supports the following filters:

- `response.body` - Filters the body sent with the response.
- `router.route_prefix` - Filters the prefix of all routes.
- `veil.data` - Filters the `$data` array passed to Veil views.

## Filter subscribers

- [LocaleFilters](localefilters.md)
- [ViewFilters](viewfilters.md)