<?php

/**
 * Example Model Class
 */

class Example
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get a list of examples
     *
     * @return object
     */
    public function getExamples()
    {
        $this->db->prepare("SELECT * FROM example");
        return $this->db->resultSet();
    }
}
