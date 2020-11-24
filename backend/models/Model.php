<?php
require_once 'configs/Database.php';
class Model {

    public $conn;

    public function __construct() {
        $connection = new Database();
        $this->conn = $connection->connection();
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>