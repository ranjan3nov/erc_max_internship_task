<?php
class Database
{
    private $host = "localhost";
    private $username = 'root';
    private $password = '';
    private  $db_name = 'ercmax_ventures';
    public $conn;

    function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        } catch (Exception $e) {
            die("DB Connection Failed" . $e->getMessage());
        }
    }
    public function query($sql)
    {
        return $this->conn->query($sql);
    }
    public function close()
    {
        return $this->conn->close();
    }
}
