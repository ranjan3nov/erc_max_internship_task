<?php
class Database
{
    private $host = "localhost";
    private $username = 'root';
    private $password = '';
    private  $db_name = '';
    public $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        } catch (Exception $e) {
            die("DB Connection Failed :" . $e->getMessage());
        }
    }
    public function query($sql)
    {
        try {
            return $this->conn->query($sql);
        } catch (Exception $e) {
            die("Sql Error :" . $e->getMessage());
        }
    }
    public function close()
    {
        return $this->conn->close();
    }
}
