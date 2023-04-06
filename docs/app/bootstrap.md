# Bootstrap

The app bootstrap file is located at `/resources/bootstrap.php`.

Bones bootstrap documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/bootstrap.md).

## Services

The following services are added to the container:

### Translate

The [Translation](https://github.com/bayfrontmedia/translation) library is added to the container as 
`Bayfront\Translation\Translate` with alias `translate`.

Translations are saved in `resources/translations`.

The default locale is taken from the `app.locale.default` config value, with a fallback to `en`.

### Filesystem

The [Flysystem](https://github.com/thephpleague/flysystem) library is added to the container as
`League\Flysystem\Filesystem` with alias `filesystem`.

The [Local](https://flysystem.thephpleague.com/docs/adapter/local/) adapter is used with the root directory of
`storage/app`.

### Logger

The [Monolog](https://github.com/Seldaek/monolog) library is added to the container as
`Monolog\Logger` with alias `log`.

Rotating logs are saved locally to `storage/app/logs` with a max of 90 files.

Logs are saved with a minimum level of `info` unless the Bones environment is `dev`, in which case
logs are saved with a minimum level of `debug`, and are also logged to the browser console.