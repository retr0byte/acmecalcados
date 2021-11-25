<?php

namespace Source\Class;

use PDO;

abstract class PostgreSqlConnection
{
    private string $hostname = HOST;
    private int $port = 5432;
    private string $username = USER;
    private string $password = PASSWD;
    private string $database = DATABASE;
    private PDO | null $conn;

    protected function init(): PDO | string
    {
        try {
            $this->conn = new PDO("pgsql:host={$this->hostname};port={$this->port};dbname={$this->database}",$this->username,$this->password);
            return $this->conn;
        }catch (\PDOException $error){
            return $error->getMessage();
        }
    }

    protected function close(): void{
        $this->conn = null;
    }
}