<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ECE Amazon - Paiement</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style type="text/css">
    .btn-lg {
      font-size: 1em;
      border-radius: 0.25rem;
      padding: 15px 48px;
    }
    
    .btn-round {
      border-width: 1px;
      border-radius: 30px !important;
      padding: 11px 23px;
    }
    
    .btn-neutral,.btn-neutral:focus,.btn-neutral:hover {
      background-color: #f3576a;
      color: white;
    }
  </style>
</head>
<body>

  <?php
   require('db.php');
    $username= $_SESSION['username'];
    $query2="SELECT id from acheteur where '$username' = username";
    $result2=mysqli_query($con,$query2);
    $row2 = mysqli_fetch_array($result2);
    $id_acheteur = $row2['id'];

   if (isset($_REQUEST['numero'])){
      $numero = stripslashes($_REQUEST['numero']);
      $numero = mysqli_real_escape_string($con,$numero);

      $mois = stripslashes($_REQUEST['mois']);
      $mois = mysqli_real_escape_string($con,$mois);

      $annee = stripslashes($_REQUEST['annee']);
      $annee = mysqli_real_escape_string($con,$annee);

      $crypto = stripslashes($_REQUEST['cryptogramme']);
      $crypto = mysqli_real_escape_string($con,$crypto);

      $query="SELECT * FROM cb WHERE numero='".md5($numero)."' AND mois='".md5($mois)."' AND annee='".md5($annee)."' AND codeS='".md5($crypto)."'";

      $result = mysqli_query($con,$query) or die(mysqli_error($con));
      $row=mysqli_num_rows($result);

      if($row==1){
          echo("<script>alert('Merci pour votre achat !');</script>");

          $query6="SELECT id_produit FROM panier WHERE id_acheteur=$id_acheteur";
          $result6=mysqli_query($con,$query6) or die(mysqli_error($con));
          while($row6 = $result6->fetch_array())
          {
                     $query3="DELETE FROM produit WHERE id='".$row6['id_produit']."'";
                      $result3=mysqli_query($con,$query3);
          }
 
          $query1="DELETE FROM panier WHERE id_acheteur='$id_acheteur'";
          $result = mysqli_query($con,$query1) or die(mysqli_error($con));






          echo $query6;
          echo $query3;
        

          echo("<div align='center'>Pour retourner au menu principal cliquez <a href='index.php'>ici</a></div>");
      }else{
      echo "<div class='container-fluid stylish-form'>
                 <div class='inner-section3'>
    <h2 align = 'center'>Erreur de Saisie</h2>
    <br/><center><a href='payement.php'> Recommencer</a></center></div></div>";}

    }else{

   ?>

  <div class="container">
    <div class="row">
      <div class="span12">
        <form class="form-horizontal span6">
          <fieldset>
            <legend>Payement</legend>
            <div class="control-group">
              <label class="control-label">Numero de Carte de Crédit</label>
              <div class="controls">
                    <input type="text" class="input-block-level" autocomplete="off" maxlength="16" pattern="\d{16}" title="numero" name="numero"required>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label">Date d'éxpiration</label>
              <div class="controls">
                  <div class="row-fluid">
                  <div class="span3">
                  <input type="text" class="input-block-level" autocomplete="off" maxlength="2" pattern="\d{2}" title="mois" name="mois" required>

                  </div>
                    <div class="span3">
                   <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="annee" name="annee"required>

                    </div>
                  </div>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label">CVV</label>
              <div class="controls">
                <div class="row-fluid">
                  <div class="span3">
                    <input type="text" class="input-block-level" autocomplete="off" maxlength="3" pattern="\d{3}" title="cryptogramme" name="cryptogramme" required>
                  </div>
                  <div class="span8">
                    <!-- screenshot may be here -->
                  </div>
                </div>
              </div>
            </div>
         
            <div class="form-actions">
              <button type="submit" class="btn btn-neutral btn-round">Payer</button>
              <!-- <button type="button" class="btn">Annuler</button> -->
              <a href="panier.php" type="btn btn-neutral btn-round">Annuler</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
</body>
</html>

