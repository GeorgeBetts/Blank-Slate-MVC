<?php

/**
 * Core
 * 
 * Main app class
 * Loads in the core controller
 * Handles default controllers and methods
 * Creates the URL from requested controller
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        if ($_GET['url']) {
            echo $_GET['url'];
        }
    }
}
