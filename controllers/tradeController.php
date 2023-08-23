<?php

require_once './models/tradeModel.php';

class TradeController {
    public function getAllTrades() {
        $dataModel = new TradeModel();
        $data = $dataModel->getAllTrades();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getTradeById($tradeId) {
        $dataModel = new TradeModel();
        $data = $dataModel->getTradeById($tradeId);

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}