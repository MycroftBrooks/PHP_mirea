<?php

class Vacancy {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;
    public ?int $salary;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->salary = htmlspecialchars(strip_tags($this->salary));

        $query = "INSERT INTO vacancy(name, salary) VALUE ('".$this->name."', '".$this->salary."');";

        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function get() {
        $query = "SELECT v.id, v.name, v.salary FROM vacancy AS v WHERE v.id = ".$this->id.";";

        $result = $this->conn->query($query)->fetch_row();
        return $result;
    }

    function get_all() {
        $query = "SELECT * FROM vacancy;";
        $result = $this->conn->query($query);
        return $result;
    }

    function update() {
        $query = "
            UPDATE vacancy 
            SET name = '".$this->name."', salary = '".$this->salary."' 
            WHERE id = ".$this->id.";
            ";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function delete() {
        $query = "DELETE FROM vacancy WHERE id = ".$this->id.";";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }
}