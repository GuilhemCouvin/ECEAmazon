<?php
//include auth.php file on all secure pages
error_reporting(E_ALL); 
ini_set("display_errors", 1);

include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ECE Amazon - Shop Homepage</title>
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
    //$query2="SELECT id from vendeur where '$username' = username";
    //$result2=mysqli_query($con,$query2);
    //$row2 = mysqli_fetch_array($result2);
    //$id_vendeur = $row2['id'];
    
    $query="SELECT produit.id, name, price, description, username FROM `produit` inner join vendeur where id_vendeur = vendeur.id and '$username'=vendeur.username   ";
    $result3= mysqli_query($con, $query);


    
?>
     <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">ECE Amazon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index_v.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
      </ul>
       
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Se déconnecter</a>
        </li>
      </ul>
      </div>
  </nav>

  <!-- Page Content -->
  
    <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <div class="list-group">
            <h3>  
                   
                     
                    
            </h3>
          <a href="ajouter_produit.php" class="list-group-item">Ajouter Produit</a>
          <a href="supprimer_produit.php" class="list-group-item">Supprimer Produit</a>
          <a href="stats.php"` class="list-group-item">Voir Stats</a>
        </div>
        
          
          
        </div>
        <!--/.lg-3-->
            
        <div class='col-lg-9'>
         <div class='row'> 
          <?php
        while($row2 = $result3->fetch_assoc())
        {
            
         echo("
          <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100'>
              <a href=''><img class='card-img-top' src='' alt=''></a>
              <div class='card-body'>
                <h4 class='card-title'>
                <a href=''>".$row2['name']."</a>
                </h4>
                <h5>".$row2['price']."".'€'."</h5>
               
                <p class='card-tex'>".$row2['description']."</p>
                <form action='suppprod.php?idprod=".$row2['id']."' method='post' autocomplete='off'>
                        <input name ='demande' type='submit' class='btn btn-sm btn-danger' value='Supprimer'/>  
                        </form>
                
              </div>
               
            </div>
          </div>
          "
        ); 
        }
        // include('fiche_test.php');
        ?>
        <!-- /.row -->
            </div>
        </div> 
      </div>
      <!-- /.col-lg-9 -->
    </div>
    
    
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright © 2018-2019 ECE Paris</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>