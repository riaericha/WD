<?php
require_once "databaseClass.php";

class Computer {
    public $id;
    public $name;
    public $unit;
    public $status;

    protected $db;

    function __construct() {
        $this->db = new Database;
    }

    function showAllAvailable() {
        $sql = "SELECT * FROM computer_units WHERE is_available = 1";
        
        $query = $this->db->connect()->prepare($sql);
        
        $data = null;

        if($query->execute()) {
            $data = $query->fetchAll();
        }

        return $data;
    }

    function showAll($unitName="", $customerName="") {
        $sql = "SELECT * FROM computer_units, computer_rentals WHERE computer_unit_id = computer_units.id AND unit_name LIKE '%' :unit_name '%' AND customer_name LIKE '%' :customer_name '%'";
        
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":unit_name", $unitName);
        $query->bindParam(":customer_name", $customerName);
        
        $data = null;

        if($query->execute()) {
            $data = $query->fetchAll();
        }

        return $data;
    }

    function add() {
        $sql = "INSERT INTO computer_rentals (customer_name, computer_unit_id, status) VALUES (:name, :unit, :status)";
        
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":name", $this->name);
        $query->bindParam(":unit", $this->unit);
        $query->bindParam(":status", $this->status);

        return $query->execute();
    }
}

?>