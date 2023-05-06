# Console

The app console commands are located at `/app/Console/Commands`.

Bones console documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/console.md).

- [DeployApp](#deployapp)
- [DeployPurge](#deploypurge)

## DeployApp

This command is designed to help facilitate the app deployment process.

An example has been given, but you will most likely need to customize this command
depending on your application and server configuration.

> **NOTE:** This command requires an additional `backup_path` key to exist in the [app configuration file](configuration.md#app)
in order to use the backup option.

```shell
# Deploy application
# TARGET examples: origin/master (branch), v1.0.0 (tag), or commit hash
php bones deploy:app TARGET
# Deploy app and create backup of current files
php bones deploy:app TARGET --backup
```

## DeployPurge

This command is designed to purge unwanted deployment backups.

> **NOTE:** This command requires an additional `backup_path` key to exist in the [app configuration file](configuration.md#app).

```shell
# Purge deployment backups
# --days= Purge backups older than number of days
# --limit= Purge oldest backups over limit
php bones deploy:purge --days=90 --limit=50
# Purge all backups
php bones deploy:purge --limit=0
```