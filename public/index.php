<?php

/**
 * Index
 * 
 * This index file is entry point for the application. Any and all
 * URLs will be directed to this index.php file, the rule for this
 * rewrite is in public/.htaccess
 */

//Bootstrap file contains all essential includes
require_once '../app/bootstrap.php';

//Initialise the Core app library
$app = new Core;
