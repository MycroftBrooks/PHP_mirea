<?php

class Database {
    public ?mysqli $conn;

    public function get_connection(): ?mysqli
    {
        $this->conn = null;

        $this->conn = new mysqli("db", "mysql", "123456", "app_db");
        $this->conn->query("set names utf8");

        return $this->conn;
    }
}