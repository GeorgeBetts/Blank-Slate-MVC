<?php

/**
 * Database Class
 * 
 * Connects to the database and handles queires
 */

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $connection;
    private $statement;
    private $error;

    public function __construct()
    {
        //Set Connection
        $connection = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //Create PDO instance
        try {
            $this->connection = new PDO($connection, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepares SQL on the current database connection
     *
     * @param [type] $sql
     * @return void
     */
    public function query($sql)
    {
        $this->statement = $this->connection->prepare($sql);
    }
}
