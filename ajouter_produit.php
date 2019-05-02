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
    $query2="SELECT id from vendeur where '$username' = username";
    $result2=mysqli_query($con,$query2);
    $row2 = mysqli_fetch_array($result2);
    $id_vendeur = $row2['id'];


    if (isset($_REQUEST['name'])){
// If form submitted, insert values into the database.
        // removes backslashes
	$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
	$name = mysqli_real_escape_string($con,$name); 
	$price = stripslashes($_REQUEST['price']);
	$price = mysqli_real_escape_string($con,$price);
    $categorie = stripslashes($_REQUEST['categorie']);
	$categorie = mysqli_real_escape_string($con,$categorie);
	$taille = stripslashes($_REQUEST['taille']);
	$taille = mysqli_real_escape_string($con,$taille);
    $quantite_tot = stripslashes($_REQUEST['quantité_totale']);
	$quantite_tot = mysqli_real_escape_string($con,$quantite_tot);
    $description = stripslashes($_REQUEST['description']);
	$description = mysqli_real_escape_string($con,$description);
    $genre = stripslashes($_REQUEST['genre']);
	$genre  = mysqli_real_escape_string($con,$genre);
    $photo = stripslashes($_REQUEST['photo']);
	$photo  = mysqli_real_escape_string($con,$photo);
	$trn_date = date("Y-m-d H:i:s");
        
        $query5 = "INSERT into produit (name, price, id_vendeur, categorie, taille, quantite_totale, description, genre, photo, trn_date)
    VALUES ('$name', '$price', $id_vendeur, '$categorie', '$taille', '$quantite_tot', '$description', '$genre', '$photo', '$trn_date')";
        $result5 = mysqli_query($con,$query5) or die(mysqli_error($con));
      
            if($result5){
            echo "<div class='form'>
            <h3>Produit ajouté !</h3>
            <br/><a href='index_v.php'>Retour au menu</a></div>";
        }

    
    }else{
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

      
        <div class="container-fluid stylish-form">
          <div class="inner-section2">
			<div class="row">
          <form>
					<div class="container-fluid inner-section2">
						<h2 class="font_white text-center">AJOUT PRODUIT</h2><br>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nom du Produit</label>
								<input type="text" placeholder="Nom du Produit" name = "name" class="form-control" required>
							</div>

							<div class="col-sm-6 form-group">
								<label>Prix</label>
								<input type="text" placeholder="Prix" name = "price" class="form-control" required>
							</div>
                            
                            <div class="col-sm-6 form-group">
								<label>Catégorie</label>
								<!--<br>
                                 <select>
                                     <option name = "categorie" value="Livres">Livres</option>
                                     <option name = "categorie" value="Musique">Musique</option>
                                     <option name = "categorie" value="Vetements">Vêtements</option>
                                     <option name = "categorie" value="Sport&Loisir">Sport et Loisir</option>
                                 </select>-->
                                <input type="text" placeholder="Catégorie" name = "categorie" class="form-control" required>
							</div>

                            <div class="col-sm-6 form-group">
								<label>Taille</label>
								<input type="text" placeholder="Taille" name="taille"  class="form-control" required>
							</div>
                            
                            <div class="col-sm-6 form-group">
								<label>Quantité totale</label>
								<input type="text" placeholder="Quantité Totale" name="quantité_totale"  class="form-control" required>
							</div>
                             <div class="col-sm-6 form-group">
								<label>Genre</label>
                                 <!--<br>
                                 <select>
                                     <option name = "genre" value="homme">Homme</option>
                                     <option name = "genre" value="femme">Femme</option>
                                     <option name = "genre" value="neutre">Neutre</option>
                                 </select>-->
								<input type="text" placeholder="Genre" name="genre"  class="form-control" required>

							</div>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea placeholder="Description du Produit" rows="3" name = "description" class="form-control" required></textarea>
						</div>	
                        
                       

						<div class="row">
                     		<div class="col-sm-6 form-group">
								<label>Photo</label>
								<input type="file"  placeholder="Photo" name = "photo">
				    		</div>

                    		
						</div>	

						<br>
						<div class="footer text-center">
							<button href="index_v.php" type="submit" class="btn btn-neutral btn-round">Ajouter</button>
							<br><br>
                        	<a href="index_v.php">Retour</a><br><br>
                    	</div>
					</div>
				</form>
              </div>
          </div> 
        </div>
        <!--/.lg-3-->
            

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

<?php } ?>
</body>
</html>