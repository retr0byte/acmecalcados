<?php

namespace Source\Class;

use PDO;

abstract class MysqlConnection
{
    private string $hostname = HOST;
    private string $username = USER;
    private string $password = PASSWD;
    private string $database = DATABASE;
    private PDO | null $conn;

    protected function init(): PDO | string
    {
        try {
            $this->conn = new PDO("mysql:host={$this->hostname};dbname={$this->database}",$this->username,$this->password);
            return $this->conn;
        }catch (\PDOException $error){
            return $error->getMessage();
        }
    }

    protected function close(): void{
        $this->conn = null;
    }
}