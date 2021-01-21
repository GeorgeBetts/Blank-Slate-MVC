<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->exampleModel = $this->model('Example');
    }

    public function index()
    {
        $examples = $this->exampleModel->getExamples();

        $data = [
            'examples' => $examples
        ];

        $this->view('pages/index', $data);
    }
}
