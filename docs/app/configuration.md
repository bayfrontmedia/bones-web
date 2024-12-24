# Configuration

The configuration files are located at `/confg`.

Bones app configuration documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

- [App](#app)
- [Router](#router)
- [Scheduler](#scheduler)
- [Veil](#veil)

## App

The `app.php` file includes [configuration required by Bones](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

In addition, this file also contains the following keys:

- `locale.valid` - Array of valid translation locales
- `locale.default` - Default translation locale used by the app
- `locale.cookie.name` - Name of cookie and URL query used to save locale preference
- `locale.cookie.duration` - Duration (in minutes) locale cookie is valid
- `locale.routes.update` - Boolean value whether to update routes to include locale
- `locale.routes.exclude.hosts` - Array of hosts to exclude from being handled by the [handleLocale](/docs/events/routes.md#handlelocale) event subscriber.
- `locale.routes.exclude.paths` - Array of paths to exclude from being handled by the [handleLocale](/docs/events/routes.md#handlelocale) event subscriber.
- `locale.routes.exclude.param` - Single parameter which, if existing, will exclude the route from being handled by the [handleLocale](/docs/events/routes.md#handlelocale) event subscriber.
- `version` - Current app version (string)

## Router

The config file `router.php` exists for the [Router service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/router.md).

## Scheduler

The config file `scheduler.php` exists for the [Scheduler service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/scheduler.md).

## Veil

The config file `veil.php` exists for the [Veil service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/veil.md).