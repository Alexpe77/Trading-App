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
}