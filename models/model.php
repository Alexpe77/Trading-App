<?php

require_once './config/databasemanager.php';

class Trade {
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getAllTrades()
    {
        $query = "SELECT id, user_id, first_name, last_name, address
        FROM profile";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTradeById($tradeId) {
        $query = "SELECT id, user_id, first_name, last_name, address
        FROM profile
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $tradeId]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}