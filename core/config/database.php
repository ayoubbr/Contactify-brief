<?php

class Database
{
    private $host = "localhost";
    private $db_name = "contactify";
    private $username = "root";
    private $password = "";

    public $connect;

    public function __construct()
    {
        $this->connect = null;

        try {
            $this->connect = new PDO("mysql:host" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connect;

        // $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        // what is dbh
        // if (mysqli_connect_errno()) {
        // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        // }
    }
}
