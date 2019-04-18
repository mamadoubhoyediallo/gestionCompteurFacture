<?php

  require_once '../model/factureDB.php';

  if (isset($_POST['envoyer'])) {
    extract($_POST);
    $ok = addFacture($datefacture, $mois, $consommation, $prix, 0, $numeroCompteur);
    header("location:factures?rep=$ok");
  }

  if(isset($_POST['modifier']))
  {
    extract($_POST);
    $factures = getAllFacture()->fetch();
    $idF = $factures[0];
    $ok = updateFullFacture($idF, $datefacture, $mois, $consommation, $prix, $numeroCompteur);
    var_dump($ok);
    //header("location:factures?rep=$ok");
  }

  if(isset($_GET['action']) && $_GET['action'] == 'delete'){
      deleteFacture($_GET['id']);
      header("location:factures");
  }

 ?>
