
<?php

  require_once '../../model/paiementDB.php';
  if (isset($_GET['id'])) {
    $paiements = getPaiementById($_GET['id']);
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title></title>
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
            <div class = "panel-heading">Liste des paiements</div>
                <div class = "panel-body">
                    <table class = "table">
                      <tr>
                        <td>Id Paiement</td>
                        <td>Date</td>
                        <td>Facture Payee</td>
                        <td>Editer</td>
                     </tr>

                     <?php
                        require_once '../../model/paiementDB.php';
                        $paiement = getAllPaiement()->fetchAll();
                        foreach ($paiement as $key => $value) {
                            echo "<tr>
                                <td>".$value[0]."</td>
                                <td>".$value[1]."</td>
                                <td>".$value[2]."</td>
                                <td><a href='?id=".$value[0]."'>Editer</a></td>
                                <td><a href='paiementController?action=delete&id=".$value[0]."' onClick='return confirm(\"Supprimer?\");''>Supprimer</a></td>
                            </tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

        <div class = "col-md-6"  style="margin-top:15px;">
            <div class = "panel panel-primary">
                <div class = "panel-heading">Formulaires de gestion des Paiement</div>
                    <div class = "panel-body">
                        <form action="paiementController" method= "POST">
                            <div class = "form-group">
                              <div class = "form-group">
                                  <!--<label class = "control-label" for="idF"></label>-->
                                  <input class = "form-control" type="hidden" name = "idP" id = "idP"/>
                              </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="date">Date</label>
                                    <input value="<?php if(isset($paiements)) echo "$paiements[1]";?>" class = "form-control" type="date" name = "date" id = "date"/>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="idF">Identifiant Facture</label>
                                    <select value="" class = "form-control" name = "idF" id = "idF">
                                        <option value="" >Faites votre choix </option>
                                        <?php
                                           require_once '../../model/factureDB.php';
                                           $facture = getAllFactureNonReglee()->fetchAll();
                                           foreach ($facture as $key => $value) {
                                               echo "<option value='".$value[0]."'>$value[0]</option>";
                                           }
                                           ?>
                                    </select>
                                </div>
                                <div class = "form-group">
                                  <?php if(isset($paiements)) { ?>
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
