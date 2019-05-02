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
  <title>ECE Amazon - Shop Homepage</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require("db.php");

        $username= $_SESSION['username'];
        $query = "SELECT id from `acheteur` where username = '$username'";
        $result= mysqli_query($con, $query);
        $row3=mysqli_fetch_array($result);
        $id=$row3['id'];
        $query3="SELECT id_produit, name, price, description, vendeur.username FROM panier inner join vendeur inner join acheteur WHERE id_vendeur = vendeur.id and acheteur.id = '$id' and panier.id_acheteur = '$id'";
        $result3= mysqli_query($con, $query3);
        
    ?>
    <?php
    require("db.php");
    ?>
    
    <?php
        $queryS="SELECT SUM(price) as total from panier where id_acheteur = $id";
        $resultS= mysqli_query($con, $queryS);
        $rowS=mysqli_fetch_array($resultS);
        $somme = $rowS['total'];
        
    
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
          <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form action="recherche.php" class="form-inline my-2 my-lg-0" method="post">
        <input name="search" type="text" class="form-control mr-sm-2" placeholder="Rechercher..."/>
        <input class="btn btn-secondary my-2 my-sm-0" type="submit" value="Rechercher"/>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="panier.php">Panier</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Se déconnecter</a>
        </li>
      </ul>
      </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
      <div class="container-fluid command2">
					<br>
					<h3 align="center">Somme Panier</h3>
					<h4>Prix : <?php echo($somme)?>€</h4>
					<div class="footer text-center">
                    	<?php 
                    		echo("
                    			<a class='btn btn-neutral btn-round' href='payement.php'>Payer</a>"
                    		);
                    	?>
                    	<br><br>
                	</div>
				</div>

    <div class="row">
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
                <a href='' class='card-tex'>".$row2['username']."</a>
                <form action='supppanier.php?idprod=".$row2['id_produit']."' method='post' autocomplete='off'>
                        <input name ='demande' type='submit' class='btn btn-sm btn-danger' value='Supprimer'/>  
                        </form>
              </div>
               
            </div>
          </div> 
          "); 
        }
        ?>
        
        <!-- /.row -->
            </div>
        </div> 
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  <!-- /.container -->
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
