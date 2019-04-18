<?php

  require_once '../model/compteurDB.php';

  if (isset($_POST['envoyer'])) {
    extract($_POST);
    $ok = addCompteur($numero, $cumulAncien, $cumulNouveau);
    header("location:compteurs?rep=$ok");
  }
  /*if(isset($_GET['action']) && isset($_GET['action'] == 'edit')){
        updateCompteur($_GET['id']);
        header("location:compteurs");
    }*/
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
       $ok = deleteCompteur($_GET['id']);
        header("location:compteurs?rep=$ok");
    }
    if(isset($_POST['modifier']))
    {
      extract($_POST);
      $cpt = getAllCompteur()->fetch();
      $numero = $cpt[0];
      $ok = updateCompteur($numero, $cumulAncien, $cumulNouveau);
      var_dump($ok);
      //header("location:compteurs?rep=$ok");
    }

    /*if (isset($_POST['modifier'])) {
      updateCompteur($numero, $cumulAncien, $cumulNouveau);
      header("location:compteurs");
    }*/
    
?>
