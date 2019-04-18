<?php

  require_once 'db.php';

  function addCompteur($numeroCompteur, $cumulAncien, $cumulNouveau)
  {
    $sql = "INSERT INTO compteur VALUES('$numeroCompteur', $cumulAncien, $cumulNouveau)";
    $cnx = getConnection();
    return $cnx->exec($sql);
  }

  function getAllCompteur()
  {
    $sql = "SELECT * FROM compteur";
    $cnx = getConnection();
    return $cnx->query($sql);
  }

  function getCompteurById($numero)
  {
    $sql = "SELECT * FROM compteur WHERE numero = '$numero'";
    $cnx = getConnection();
    return $cnx->query($sql)->fetch();
  }

  function updateCompteur($numeroCompteur, $cumulAncien, $cumulNouveau)
  {
        $sql = "UPDATE compteur
                 SET numero = '$numeroCompteur', cumulAncien = $cumulAncien, cumulNouveau = $cumulNouveau
                 WHERE numero = '$numeroCompteur'";
        $connexion = getConnection();
        return $connexion->exec($sql);
  }

    function deleteCompteur($id)
    {
        $sql = "DELETE FROM compteur WHERE numero = '$id'";
        $connexion = getConnection();
        return $connexion->exec($sql);
    }

 ?>
