<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Origin, X-Requested-width, Content-Type, Accept");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Max-Age", "1728000");

    require_once '../../model/db.php';
    require_once '../../model/factureDB.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    $id = $input['id'];
    $sql = "SELECT * FROM facture".($id?"WHERE idF=$id":'');
    $facture = getAllFacture1($sql);

    $retour = $facture->fetchAll();

    echo json_encode($retour);

?>