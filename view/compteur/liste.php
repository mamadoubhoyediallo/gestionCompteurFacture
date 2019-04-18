<?php

  require_once '../../model/compteurDB.php';
  $compteur = getAllCompteur()->fetchAll();
  if (isset($_GET['numero'])) {
    $compteurs = getCompteurById($_GET['numero']);
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script type = "text/javascript" src = "public/js/jquery.js"></script>
    <script type = "text/javascript" src = "public/js/jquery-ui.js"></script>

    <title></title>
    <script type="text/javascript">

    </script>
  </head>
  <body>
    <div class="nav navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
        <ul class="nav navbar-nav">
          <li><a href="compteurs">Gestion Compteur</a></li>
          <li><a href="factures">Gestion Facture</a></li>
          <li><a href="paiements">Gestion Paiement</a></li>
        </ul>
    </div>

    <div class= "col-md-6" style="margin-top:15px;">
        <div class = "panel panel-primary">
            <div class = "panel-heading">Liste des compteurs</div>
                <div class = "panel-body">
                    <table class = "table table-bordered">
                      <tr>
                        <td>Numero Compteur</td>
                        <td>Cumul Ancien</td>
                        <td>Cumul Nouveau</td>
                        <td>Editer</td>
                        <td>Supprimer</td>

                     </tr>

                     <?php
                        foreach ($compteur as $key => $value) {
                          echo "<tr>
                                  <td>".$value[0]."</td>
                                  <td>".$value[1]."</td>
                                  <td>".$value[2]."</td>
                                  <td><a href='?numero=".$value[0]."'>Editer</a></td>
                                  <td><a href='compteurController?action=delete&id=".$value[0]."' onClick='return confirm(\"Supprimer?\");''>Supprimer</a></td>
                              </tr>";
                        }


                      ?>

                    </table>
                </div>
            </div>
        </div>

        <div class = "col-md-6"  style="margin-top:15px;">
            <div class = "panel panel-primary">
                <div class = "panel-heading">Formulaires de gestion des formations </div>
                    <div class = "panel-body">
                        <form action="compteurController" method= "POST">
                            <div class = "form-group">
                              <div class = "form-group">
                                  <label class = "control-label" for="numero">Numero Compteur</label>
                                  <input  value="<?php if(isset($compteurs)) echo $compteurs[0];?>" class = "form-control" type="text" name = "numero" id = "numero"/>
                              </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="id">Cumul Ancien</label>
                                    <input value="<?php if(isset($compteurs)) echo $compteurs[1];?>" class = "form-control" type="number" name = "cumulAncien" id = "cumulAncien"/>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="nom">Cumul Nouveau</label>
                                    <input value="<?php if(isset($compteurs)) echo $compteurs[2];?>" class = "form-control" type="number" name = "cumulNouveau" id = "cumulNouveau"/>
                                </div>
                                <div class = "form-group">
                                  <?php if(isset($compteurs)) { ?>
                                      <input class = "btn btn-success" type="submit" name="modifier" id = "modifier" value = "MODIFIER">
                                  <?php } else { ?>
                                      <input class = "btn btn-success" type="submit" name = "envoyer" id = "envoyer" value = "ENVOYER">
                                  <?php }?>

                                  <input class = "btn btn-danger pull-right" type="reset" name = "annuler" id = "annuler" value = "ANNULER">
                                </div>
                            </div>


                         </form>

                    </div>
                 </div>
             </div>
  </body>
</html>
