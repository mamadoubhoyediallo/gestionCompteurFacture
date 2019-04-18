<?php

  require_once '../../model/factureDB.php';
  if (isset($_GET['id'])) {
    $factures = getFactureById($_GET['id']);
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title></title>
    <script type = "text/javascript">
    $(document).ready(function(){
        $.ajax({
            url:"http://localhost/mesprojets/projetExamS1/ajax-compteurs?action=liste",
            type:"get",
            dataType:"json",
            success:function(json) {
                $.each(json, function(index, value) {
                    //alert(value);
                    var f_id = 0;
                    //=============================================================

                    <?php if(isset($factures)) { ?>
                        f_id = <?php if(isset($factures)) echo $factures[6]; ?>;
                        //alert(f_id);
                    <?php } ?>
                    if(f_id == index)
                        $("#numeroCompteur").append("<option selected value='"+index+"'>"+value+"</option>");
                    else
                        $("#numeroCompteur").append("<option value='"+index+"'>"+value+"</option>");

                    //$("#r_lieu").append("<option value='"+index+"'>"+value+"</option>");

                });
            }
        });
        });
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

    <div class= "col-md-8" style="margin-top:15px;">
        <div class = "panel panel-primary">
            <div class = "panel-heading">Liste des Facture</div>
                <div class = "panel-body">
                    <table class = "table">
                      <tr>
                        <td>Id Facture</td>
                        <td>Date</td>
                        <td>Mois</td>
                        <td>Consommation</td>
                        <td>Prix</td>
                        <td>Reglement</td>
                        <td>Numero Compteur</td>
                        <td>Editer</td>
                        <td>Supprimer</td>
                     </tr>

                     <?php
                        require_once '../../model/factureDB.php';
                        $facture = getAllFacture()->fetchAll();
                        foreach ($facture as $key => $value) {
                            echo "<tr>
                                <td>".$value[0]."</td>
                                <td>".$value[1]."</td>
                                <td>".$value[2]."</td>
                                <td>".$value[3]."</td>
                                <td>".$value[4]."</td>
                                <td>".$value[5]."</td>
                                <td>".$value[6]."</td>
                                <td><a href='?id=".$value[0]."'>Editer</a></td>
                                <td><a href='factureController?action=delete&id=".$value[0]."' onClick='return confirm(\"Supprimer?\");''>Supprimer</a></td>

                            </tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

        <div class = "col-md-4"  style="margin-top:15px;">
            <div class = "panel panel-primary">
                <div class = "panel-heading">Formulaires de gestion des factures</div>
                    <div class = "panel-body">
                        <form action="factureController" method= "POST">
                            <div class = "form-group">
                              <div class = "form-group">
                                  <!--<label class = "control-label" for="idF"></label>-->
                                  <input class = "form-control" type="hidden" name = "idF" id = "idF"/>
                              </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="datefacture">Date</label>
                                    <input value="<?php if(isset($factures)) echo "$factures[1]";?>" class = "form-control" type="date" name = "datefacture" id = "datefacture"/>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="mois">Mois</label>
                                    <input value="<?php if(isset($factures)) echo "$factures[2]";?>" class = "form-control" type="text" name = "mois" id = "mois"/>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="consommation">Consommation</label>
                                    <input value="<?php if(isset($factures)) echo "$factures[3]";?>" class = "form-control" type="number" name = "consommation" id = "consommation"/>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label" for="prix">Prix</label>
                                    <input value="<?php if(isset($factures)) echo "$factures[4]";?>" class = "form-control" type="number" name = "prix" id = "prix"/>
                                </div>
                                <!--<div class = "form-group">
                                    <label class = "control-label" for="reglement">Reglement</label>
                                    <input class = "form-control" type="number" name = "reglement" id = "reglement"/>
                                </div>-->
                                <div class = "form-group">
                                    <label class = "control-label" for="numeroCompteur">Numéro de Compteur</label>
                                    <select value="" class = "form-control" name = "numeroCompteur" id = "numeroCompteur">
                                        <option value="" >Faites votre choix </option>
                                        <?php
                                           require_once '../../model/compteurDB.php';
                                           $compteur = getAllCompteur()->fetchAll();
                                           foreach ($compteur as $key => $value) {
                                               echo "<option value='".$value[0]."'>$value[0]</option>";
                                           }
                                           ?>
                                    </select>
                                </div>
                                <div class = "form-group">
                                  <?php if(isset($factures)) { ?>
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
