# Events: Routes

Router-related events.

| Subscriber (method)           | Event           | Priority |
|-------------------------------|-----------------|----------|
| [addRoutes](#addroutes)       | `app.bootstrap` | 10       |
 | [handleLocale](#handlelocale) | `app.http`      | 10       |

## addRoutes

Define routes.

The following routes have been defined:

| Name      | Path              | Filtered |
|-----------|-------------------|----------|
| `storage` | `/storage/public` | No       |
 | N/A       | `/api` *          | No       |
 | `home`    | `/`               | Yes      |

* The `/api` route exists simply as an example of how and why you may wish to exclude certain routes
from being processed by the `handleLocale` event subscriber. For more information, see [handleLocale](#handlelocale).

### Filtered

Unfiltered routes use the predefined `router.route_prefix` config value as the route prefix.
Filtered routes use the `router.route_prefix` filter to define the route prefix.

Unfiltered routes are ideal for non-changing routes such as for static assets and API endpoints.

## handleLocale

Set locale based on URL locale query parameter or cookie, and redirect if needed.

This method relies on the following protected methods:

- `getLocaleFromUrl`
- `redirectWithLocale`
- `getPrefixDiff`
- `redirectTo`

This method handles setting the locale cookie and translation locale, and redirecting the request if needed.

### Excluding routes

This method can exclude routes by host, path, or if a parameter has been passed to the route.
These settings are configured in the `app.locale.routes.exclude` [config array](/docs/app/configuration.md#app).