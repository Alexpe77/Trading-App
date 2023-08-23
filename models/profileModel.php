<?php

require_once './config/databasemanager.php';

class ProfileModel {
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getProfile() {
        $query = "SELECT id, user_id, first_name, last_name, address
        FROM profile";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateProfile() {
        $query = "UPDATE profile SET first_name = :first_name, last_name = :last_name, address = :address
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':id', PDO::PARAM_INT);
        $statement->bindParam(':first_name', PDO::PARAM_STR);
        $statement->bindParam(':last_name', PDO::PARAM_STR);
        $statement->bindParam(':address', PDO::PARAM_STR);
        $statement->execute();
    }
}