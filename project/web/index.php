<?php

if (getenv('APP_DEBUG') == 1) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    error_reporting(E_ALL & ~E_USER_DEPRECATED);
} else if (getenv('APP_DEBUG') == 0) {
    error_reporting(~E_USER_DEPRECATED);
}
$env = null;
switch (getenv('APP_ENV')) {
    case 'local':
    case 'dev': {
        $env = 'dev';
        break;
    }
    case 'prod': {
        $env = 'prod';
        break;
    }
}
define('YII_ENV', $env);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
