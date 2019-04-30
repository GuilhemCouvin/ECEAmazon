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
</head>
<body>
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
			  <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
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
	<div class="container-fluid">
		<div class="col-md-8">
			<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		      <ol class="carousel-indicators">
		        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		      </ol>
		      <div class="carousel-inner" role="listbox">
		        <div class="carousel-item active">
		          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
		        </div>
		        <div class="carousel-item">
		          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
		        </div>
		        <div class="carousel-item">
		          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
		        </div>
		      </div>

		      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		        <span class="sr-only">Previous</span>
		      </a>

		      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
		      </a>
		    </div>
		</div>
		<div class="col-md-8 inner-section4">
			
		</div>
	</div>
</body>
</html>