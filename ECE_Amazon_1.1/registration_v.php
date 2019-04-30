<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="login.css" media = "all" />
    <script src="bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $nom = stripslashes($_REQUEST['username']);
	$nom = mysqli_real_escape_string($con,$nom);
	$username = $nom;
    $adresse = stripslashes($_REQUEST['adresse']);
	$adresse = mysqli_real_escape_string($con,$adresse);
    $profil = stripslashes($_REQUEST['profil']);
	$profil = mysqli_real_escape_string($con,$profil);
    $couverture = stripslashes($_REQUEST['couverture']);
	$couverture  = mysqli_real_escape_string($con,$couverture );
	$trn_date = date("Y-m-d H:i:s");
    
    $query2="SELECT email FROM vendeur where username = 'usersame' ";
    $result2 = mysqli_query($con, $query2);
    $row2 = $result2->fetch_assoc();
    
        if(isset($row2['username']))
        {
            echo "<script>alert('Cette société est déjà enregistrée');
            </script>
            Click here to <a href='registration_v.php'>Retry</a>
            ";
        }
           else
           {
               $query = "INSERT into vendeur (email, password, username, adresse, profil, couverture, trn_date)
            VALUES ('$email','".md5($password)."','$nom',  '$adresse', '$profil', '$couverture', '$trn_date')";
            $result = mysqli_query($con,$query);
            if($result){
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
        }
           }

    }else{
    	echo "ERROR REGISTRATION";
?>
    <div class="container-fluid stylish-form">
    	<h2 align = "center">Inscription sur ECE Amazon</h2>
		<div class="inner-section2">
			<div class="row">
				<form>
					<div class="container-fluid inner-section2">
						<h2 class="font_white text-center">INSCRIPTION ACHETEUR</h2><br>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nom de la société</label>
								<input type="text" placeholder="Nom de la société" name = "username" class="form-control" required>
							</div>

                            <div class="col-sm-6 form-group">
								<label>Mot de passe</label>
								<input type="password" placeholder="Mot de passe" name="password"  class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label>Addresse</label>
							<textarea placeholder="EX: 71 rue du Théatre, 75015 Paris" rows="3" name = "adresse" class="form-control" required></textarea>
						</div>	

						<div class="row">
                     		<div class="col-sm-6 form-group">
								<label>Photo de profil</label>
								<input type="file"  placeholder="Photo" name = "profil">
				    		</div>

                    		<div class="col-sm-6 form-group">
								<label>Image de fond préférée</label>
								<input type="file" placeholder="PhotoCouv" name = "couverture">
				    		</div>
						</div>	

						<div class="form-group">
							<label>Email</label>
							<input type="text" placeholder="Email" name ="email" class="form-control" required>
						</div>
						<br>
						<div class="footer text-center">
							<button href ="index.php" type="submit" class="btn btn-neutral btn-round">Ajouter</button>
							<br><br>
							<a href="choix.php">Retour</a><br><br>
                        </div> 
					</div>
				</form>  
			</div>
		</div>
	</div>
<?php } ?>
</body>
</html>