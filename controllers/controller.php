<?php

require_once './models/model.php';

class Controller {
    public function getAllTrades() {
        $dataModel = new Trade();
        $data = $dataModel->getAllTrades();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getTradeById($tradeId) {
        $dataModel = new Trade();
        $data = $dataModel->getTradeById($tradeId);

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}