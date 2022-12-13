<?php

class Menu {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;
    public ?int $price;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));

        $query = "INSERT INTO product(name, price) VALUE ('".$this->name."', '".$this->price."');";

        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function get() {
        $query = "SELECT p.id, p.name, p.price FROM product AS p WHERE p.id = ".$this->id.";";

        $result = $this->conn->query($query)->fetch_row();
        return $result;
    }

    function get_all() {
        $query = "SELECT * FROM product;";
        $result = $this->conn->query($query);
        return $result;
    }

    function update() {
        $query = "
            UPDATE product 
            SET name = '".$this->name."', price = '".$this->price."' 
            WHERE id = ".$this->id.";
            ";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function delete() {
        $query = "DELETE FROM product WHERE id = ".$this->id.";";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }
}