<?php
if(isset($_GET['action']))
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, Content-Type");
    header("Content-Type: application/json; charset=UTF-8");
    $rest_json = file_get_contents('php://input');

    require_once '../../model/compteurDB.php';
    $result = getAllCompteur()->fetchAll();
    $lieux = array();

    foreach ($result as $key => $value){

        $lieux[$value[0]] = utf8_encode($value[0]);
    }

    echo json_encode($lieux);
}

?>
