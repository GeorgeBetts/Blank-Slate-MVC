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
        $url = $this->getUrl();

        // Load in the controller from the first URL param
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                //If exists then set as the current controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }

        // Include the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // Handle the method using the second URL param
        if (isset($url[1])) {
            //Check if the method exists in the controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Set the params using the third (and more) URL params
        $this->params = $url ? array_values($url) : [];

        // Calls the method of the controller passing in the params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Get the current url
     * transforms the URL into an array
     * format: /controller/method/params
     *
     * @return array
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }
}
