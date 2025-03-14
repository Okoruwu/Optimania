<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Optimania";

    private static $conn = null;

    private function __construct()
    {
        self::$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (self::$conn->connect_error) {
            die("Conexión fallida: " . self::$conn->connect_error);
        }
    }

    public static function getConnection()
    {
        if (self::$conn === null) {
            new Database();
        }
        return self::$conn;
    }
}
?>