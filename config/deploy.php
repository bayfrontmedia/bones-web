<?php

use Bayfront\Bones\Application\Utilities\App;

/*
 * Configuration for deployment scripts (console commands).
 */

return [
    'backup_path' => App::getEnv('APP_BACKUP_PATH') // Path where deployment backups will be saved on the server
];