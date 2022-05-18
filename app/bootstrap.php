<?php

    // this file will require all the necessary files we need (libraries | config | helpers | modesl ...)

    //Load Config
    require_once 'config/config.php';

    //Load Libraries
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    //Auto Core App
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });
