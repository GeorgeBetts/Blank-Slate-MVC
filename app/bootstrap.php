<?php

//Load in environment
require_once 'config/env.php';

//Autoload core framework libraries
spl_autoload_register(function ($className) {
    require '../app/lib/' . $className . '.php';
});
