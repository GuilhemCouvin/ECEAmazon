<?php
//include auth.php file on all secure pages
include('fiche_produit.php');
include("auth.php");
?>
<?php
    require("db.php");

    $id_produit=$_GET['name'];

    $username= $_SESSION['username'];
    $query="SELECT id FROM `acheteur` WHERE username='$username'";
	$result= mysqli_query($con, $query) or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);
	$id_acheteur=$row['id'];


	$query1="SELECT * FROM produit WHERE id='$id_produit'";
	
	$result1= mysqli_query($con, $query1) or die(mysqli_error($con));
	$row1=mysqli_fetch_array($result1);

	$name =$row1['name'];
	$price =$row1['price'];
	$id_vendeur =$row1['id_vendeur'];
	$categorie =$row1['categorie'];
	$taille =$row1['taille'];
	$description =$row1['description'];
	$genre =$row1['genre'];
	$photo =$row1['photo'];
	$trn_date =$row1['trn_date'];
	
	$query2 = "INSERT into panier (id_produit, name, price, id_vendeur , id_acheteur, categorie, taille, description, genre, photo, trn_date)
            VALUES ('$id_produit', '$name','$price','$id_vendeur','$id_acheteur','$categorie','$taille','$description','$genre','$photo','$trn_date')";
            
    $result2 = mysqli_query($con,$query2) or die(mysqli_error($con));

    echo'<script>alert("Article ajouté au panier avec succès !");</script>';
 ?>