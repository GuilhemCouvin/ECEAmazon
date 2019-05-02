<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ECE Amazon - Fiche Produit</title>
	<meta charset="utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="login.css" media = "all" /> -->

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="ajout_panier.js"></script>
	<style type="text/css">
		.product-style{
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
	</style>
</head>
<body>
	<!-- TRAITEMENT PHP -->
	<?php
    require("db.php");

        $username= $_SESSION['username'];
        $id=$_GET['name'];
        $query="SELECT * FROM `produit` WHERE id = $id";
        $result= mysqli_query($con, $query);
        $row = $result->fetch_assoc();

        $query2="SELECT photo FROM `produit` WHERE id = $id";
        $result2= mysqli_query($con, $query2);
        $photo= mysqli_fetch_assoc($result2);
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
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="text" placeholder="Rechercher...">
			  <button class="btn btn-neutral my-2 my-sm-0" type="submit">Rechercher</button>
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

	<!-- BODY -->
	<div class="container-fluid product-style">
		<div class="row">
			<div class="col-md-8">
				<div class="col-md-6">
					<br>
					<div class="Firsttitle">
						<h2 align="center"><?php echo($row['name'])?></h2>
					</div>
				</div>
				<div>
					<img class="d-block img-fluid" align="center" src= "<?php echo "img/".implode($photo);?>" alt="First slide">
					<br>
				</div>
			</div>
			<div class="col-md-4 command">
				<br><br>
				<div class="container-fluid command2">
					<br>
					<h3 align="center">Commander</h3>
					<h4>Prix : <?php echo($row['price'])?>€</h4>
					<div class="footer text-center">
                    	<?php 
                    		echo("
                    			<a class='btn btn-neutral btn-round' href='ajout_panier.php?name=".$_GET['name']."'>Ajouter au panier</a>"
                    		);
                    	?>
                    	<br><br>
                	</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container-fluid product-style2">
			<div class="row">
				<div class="col-md-8 command3"><br>
					<h3>Description</h3>
					<p><?php echo($row['description'])?></p>
					<br>
				</div>
			</div>
		</div>
		<br><br>
	<footer class="py-5 bg-light">
    	<div class="container">
    	  <p class="m-0 text-center text-black">Copyright © 2018-2019 ECE Paris</p>
    	</div>
  	</footer>
</body>
</html>