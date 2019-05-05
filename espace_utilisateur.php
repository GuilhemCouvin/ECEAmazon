<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ECE Amazon - Mon Compte</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style type="text/css">
  		.account-style{
  			justify-content: center;
  			background-image: url(img/ECE.jpg);
  			background-size:cover;
  			background-position: center center;
		}
		.Firsttitle{
			background-color: rgba(255,255,255,.9);
			border-radius: 8px;
		}
		.command2{
			background-color: rgba(255,255,255,.9);
			border-radius: 8px;
		}
		.command3{
			background-color: rgba(0,0,0,.1);
			border-radius: 8px;
		}
		.command2 h3{
			color: #007179;
			font-weight: bold;
    		text-transform: uppercase;
		}
		.command3 h3{
			color: #007179;
			font-weight: bold;
    		text-transform: uppercase;
		}
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
	<!-- TRAITEMENT PHP -->
	<?php  
	require("db.php");
	$username= $_SESSION['username'];
	$query="SELECT * FROM acheteur WHERE username='$username'";
	$result= mysqli_query($con, $query);
  $row = $result->fetch_assoc();
  $id = $row['id'];

  $query2="SELECT * FROM produit_vendu WHERE id_acheteur=$id";
  $result2=mysqli_query($con,$query2);
	?>

	<!-- NAVBAR -->
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
        <input class="btn btn-neutral my-2 my-sm-0" type="submit" value="Rechercher"/>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="panier.php">Panier</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="espace_utilisateur.php">Mon Compte</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Se déconnecter</a>
        </li>
      </ul>
      </div>
  </nav>

  <div class="container-fluid account-style">
  	<br>
  	<div class="row">
  		<div class="col-md-8 command2">
  			<br>
  			<h3 align="center">Mon compte</h3>
  			<br><br>
  			<h4><?php echo($row['username'])?></h4>
  		  <h5>Nom : <?php echo($row['nom'])?></h5>
			  <h5>Prenom : <?php echo($row['prenom'])?></h5>
			  <h5>Email : <?php echo($row['email'])?>	</h5>
			  <br>
			  <h5>Adresse de livraison : <?php echo($row['adresse'])?></h5>
			  <br>
  		</div>
  		<br>
  	</div>
  	<br>
  </div>
  <br>
   <div class="container-fluid product-style">
    <br>
    <div class="row">
      <div class="col-md-8 command2">
        <br>
        <h3 align="center"> Historique des achats</h3>
        <br>
    <?php
        while($row2 = $result2->fetch_assoc())
        {
         echo("
          <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100'>
              <a href=''><img class='card-img-top' src='img/.implode($photo)' alt=''>$photo</a>
              <div class='card-body'>
                <h4 class='card-title'>
                <a href='#'>".$row2['name']."</a>
                </h4>
                <h5>".$row2['price']."".'€'."</h5>
                <p class='card-tex'>".$row2['description']."</p>
                <a href='' class='card-tex'>".$row2['username']."</a>
              </div>
            </div>
          </div>"
        ); 
        }
        // include('fiche_test.php');
        ?>
      </div>
  </div>
</div>
<br><br>

  <footer class="py-3 bg-light footer">
    	<div class="container">
    	  <p class="m-0 text-center text-black">Copyright © 2018-2019 ECE Paris</p>
    	</div>
  	</footer>

</body>
</html>