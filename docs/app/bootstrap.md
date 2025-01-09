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