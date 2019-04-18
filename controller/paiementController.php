<?php

  require_once '../model/paiementDB.php';
  require_once '../model/factureDB.php';
  if (isset($_POST['envoyer'])) {
    extract($_POST);
    $ok = addPaiement($date, $idF);
    if ($ok =! 0) {
      updateFacture($idF);
    }
    header("location:paiements?rep=$ok");
  }

  if (isset($_POST['modifier']))
  {
    extract($_POST);
    $paiements = getAllPaiement()->fetch();
    $idP = $paiements[0];
    $ok = updatePaiement($idP, $date, $idF);
    var_dump($ok);
    header("location:paiements?rep=$ok");
  }
  if(isset($_GET['action']) && $_GET['action'] == 'delete'){
      deletePaiement($_GET['id']);
      header("location:paiements");
  }
 ?>
