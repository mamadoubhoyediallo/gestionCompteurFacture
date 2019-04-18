<?php

  require_once 'db.php';

  function addFacture($date, $mois, $consommation, $prix, $reglement, $numeroCompteur)
  {
    $reglement = false;
    $sql = "INSERT INTO facture VALUES(NULL, '$date', '$mois', $consommation, $prix, '$reglement', '$numeroCompteur')";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }

  function updateFacture($idF)
  {
    $sql = "UPDATE facture SET reglement = 1 WHERE idF = $idF";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }

  function getAllFacture()
  {
    $sql = "SELECT * FROM facture";
    $cnx = getConnection();
    return $cnx->query($sql);
  }
  function getAllFactureReglee()
  {
    $sql = "SELECT * FROM facture WHERE reglement = 1";
    $cnx = getConnection();
    return $cnx->query($sql);
  }
  function getAllFactureNonReglee()
  {
    $sql = "SELECT * FROM facture WHERE reglement = 0";
    $cnx = getConnection();
    return $cnx->query($sql);
  }
  function getFactureById($idF)
  {
    $sql = "SELECT * FROM facture WHERE idF = $idF";
    $cnx = getConnection();
    return $cnx->query($sql)->fetch();
  }

  function updateFullFacture($idF, $datefacture, $mois, $consommation, $prix, $numeroCompteur)
  {
    //$reglement = 0;
    $sql = "UPDATE facture
            SET datefacture = '$datefacture', mois = '$mois', consommation = $consommation,
            prix = $prix, numero = '$numeroCompteur'
            WHERE idF = $idF";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }

  function deleteFacture($id)
  {
      $sql = "DELETE FROM facture WHERE idF = $id";
      $connexion = getConnection();
      return $connexion->exec($sql);
  }

  function getAllFacture1($sql){
    $connexion = getConnection();
    return $connexion->query($sql);
  }

 ?>
