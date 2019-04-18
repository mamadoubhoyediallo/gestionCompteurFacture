<?php

  require_once 'db.php';

  function addPaiement($date, $idF)
  {
    $sql = "INSERT INTO paiement VALUES(NULL, '$date', $idF)";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }
  function getAllPaiement()
  {
    $sql = "SELECT * FROM paiement";
    $cnx = getConnection();
    return $cnx->query($sql);
  }

  function getPaiementById($idP)
  {
    $sql = "SELECT * FROM paiement WHERE idF = $idP";
    $cnx = getConnection();
    return $cnx->query($sql)->fetch();
  }

  function updatePaiement($idP, $date, $idF)
  {
    $sql = "UPDATE paiement SET date = '$date', idF = $idF WHERE idP = '$idP'";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }
  function deletePaiement($id)
  {
      $sql = "DELETE FROM paiement WHERE idP = $idP";
      $connexion = getConnection();
      return $connexion->exec($sql);
  }

 ?>
