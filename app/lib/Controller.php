<?php

/**
 * Base Controller
 * Loads models and views
 * 
 * All Controllers should extend this one
 */

class Controller
{
    /**
     * Loads in the passed model
     *
     * @param [string] $model
     * @return Object
     */
    public function model($model)
    {
        require_once('../app/models/' . $model . '.php');
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            //View doesn't exist
            die('view does not exist');
        }
    }
}
