<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->exampleModel = $this->model('Example');
    }

    public function index()
    {
        $this->view('pages/index');
    }
}
