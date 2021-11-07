<?php

namespace Source\Class;

class Mysql
{
    private string $hostname;
    private string $username;
    private string $password;
    private string $database;


    public function __construct($host, $user, $passwd, $db)
    {
        $this->hostname = $host;
        $this->username = $user;
        $this->password = $passwd;
        $this->database = $db;
    }

    public function connect()
    {
        $connect = mysqli_connect(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );

        if ($connect->connect_errno) {
            echo "Failed to connect to MySQL: " . $connect->connect_error;
            exit();
        }

        return $connect;
    }
}