<?php

require_once './config/databasemanager.php';

class TradeModel
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getAllTrades()
    {
        $query = "SELECT id, profile_id, symbol, quantity, open_price, close_price, open_datetime, close_datetime, open FROM trade";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTradeById($tradeId)
    {
        $query = "SELECT id, profile_id, symbol, quantity, open_price, close_price, open_datetime, close_datetime, open FROM trade
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $tradeId]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
