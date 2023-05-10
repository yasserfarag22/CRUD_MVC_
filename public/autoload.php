<?php

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH", dirname(__DIR__) . DS);
define("APP", ROOT_PATH . 'APP' . DS);
define("CORE", APP . 'Core' . DS);
define("CONFIG", APP . 'Config' . DS);
define("CONTROLLERS", APP . 'Controllers' . DS);
define("MODELS", APP . 'Models' . DS);
define("VIEWS", APP . 'Views' . DS);
define("Libs", APP . 'Libs' . DS);
define("UPLOADS", ROOT_PATH . 'public' . DS . 'uploads' . DS);

require_once(CONFIG . 'config.php');
require_once(CONFIG . 'helpers.php');

$modules = [ROOT_PATH, APP, CORE, VIEWS, CONTROLLERS, MODELS, CONFIG, Libs];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register(function ($className) {
    $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    $directories = [
        ROOT_PATH,
        APP,
        CORE,
        VIEWS,
        CONTROLLERS,
        MODELS,
        CONFIG
    ];

    foreach ($directories as $directory) {
        $path = $directory . $classFile;
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

new APP();
