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
    public function prepare($sql)
    {
        $this->statement = $this->connection->prepare($sql);
    }

    /**
     * Bind a value to the prepare statement
     *
     * @param [string] $param
     * @param [variable] $value
     * @param [PDO::VARIABLE_TYPE] $type
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement
     *
     * @return bool
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * Return an array of results
     *
     * @return object
     */
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Return a single result
     *
     * @return object
     */
    public function result()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Return a row count
     *
     * @return int
     */
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
