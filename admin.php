<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ECE Amazon - Admin</title>
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
    .footer{
      position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
  </style>

</head>

<body>
    <?php
    require("db.php");

    $username= $_SESSION['username'];

    $query="SELECT * FROM acheteur";
    $requete = mysqli_query($con,$query);

    $query1="SELECT * FROM vendeur";
    $requete1 = mysqli_query($con,$query1);

    $query2="SELECT * FROM panier";
    $requete2 = mysqli_query($con,$query2);

    $query3="SELECT * FROM produit";
    $requete3 = mysqli_query($con,$query3);

    $query4="SELECT * FROM produit_vendu";
    $requete4 = mysqli_query($con,$query4);

    $query5="SELECT * FROM cb";
    $requete5 = mysqli_query($con,$query5);

    $query6="SELECT * FROM admin";
    $requete6 = mysqli_query($con,$query6);
    
    ?>
    
    
 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin.php">ECE Amazon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="admin.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
      </ul>       
    </div>
     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin.php"><?php echo($username)?></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Se déconnecter</a>
        </li>
      </ul>
    </div>
  </nav>
<br>
  <!-- Page Content -->
  <div class="container">
    <div class="row" align="center">
      <h3 align="center">Liste des admins</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Username</th>
          <th>Prénom</th>
          <th>Nom</th>
        </tr>
      <?php
      while($info6 = $requete6->fetch_assoc())
      { echo("
         <tr>
          <td>".$info6['username']."</td>
          <td>".$info6['prenom']."</td>
          <td>".$info6['nom']."</td>
          <td><a href='suppadmin.php?name1=".$info6['username']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des acheteurs</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Username</th>
          <th>Prénom</th>
          <th>Nom</th>
        </tr>
      <?php
      while($info = $requete->fetch_assoc())
      { echo("
         <tr>
          <td>".$info['username']."</td>
          <td>".$info['prenom']."</td>
          <td>".$info['nom']."</td>
          <td><a href='suppadmin.php?name2=".$info['id']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des vendeurs</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Nom de la société</th>
          <th>Email</th>
          <th>Adresse</th>
        </tr>
      <?php
      while($info1 = $requete1->fetch_assoc())
      { echo("
         <tr>
          <td>".$info1['username']."</td>
          <td>".$info1['email']."</td>
          <td>".$info1['adresse']."</td>
          <td><a href='suppadmin.php?name3=".$info1['id']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des produits en vente</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Nom</th>
          <th>Catégorie</th>
          <th>Prix</th>
        </tr>
      <?php
      while($info3 = $requete3->fetch_assoc())
      { echo("
         <tr>
          <td>".$info3['name']."</td>
          <td>".$info3['categorie']."</td>
          <td>".$info3['price']."€</td>
          <td><a href='suppadmin.php?name4=".$info3['id']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des produits dans le panier des utilisateurs</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Nom</th>
          <th>Catégorie</th>
          <th>Prix</th>
        </tr>
      <?php
      while($info2 = $requete2->fetch_assoc())
      { echo("
         <tr>
          <td>".$info2['name']."</td>
          <td>".$info2['categorie']."</td>
          <td>".$info2['price']."€</td>
          <td><a href='suppadmin.php?name5=".$info2['id_produit']."&name8=".$info2['id_acheteur']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des produits vendus</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Nom</th>
          <th>Catégorie</th>
          <th>Prix</th>
        </tr>
      <?php
      while($info4 = $requete4->fetch_assoc())
      { echo("
         <tr>
          <td>".$info4['name']."</td>
          <td>".$info4['categorie']."</td>
          <td>".$info4['price']."€</td>
          <td><a href='suppadmin.php?name6=".$info4['id']."'>Supprimer</td>
         </tr>
      
      ");}
      ?>
      </table>
    </div><br>
    <div class="row" align="center">
      <h3 align="center">Liste des CB enregistrées</h3><br>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <th>Numéro de carte</th>
          <th>Date d'expiration</th>
          <th>Cryptogramme</th>
        </tr>
      <?php
      while($info5 = $requete5->fetch_assoc())
      { echo("
         <tr>
          <td>".$info5['numero']."</td>
          <td>".$info5['mois']."".$info5['annee']."</td>
          <td>".$info5['codeS']."</td>
          <td><a href='suppadmin.php?name7=".$info5['numero']."&name9=".$info5['codeS']."'>Supprimer</td>
         </tr>
      ");}
      ?>
      </table>
    </div><br>
    <br><br>
  </div><br>
  <!-- /.row -->
  <!-- /.container -->
  <!-- Footer -->
  <footer class="py-3 bg-light footer">
    <div class="container">
      <p class="m-0 text-center text-black">Copyright © 2018-2019 ECE Paris</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
