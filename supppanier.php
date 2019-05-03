<?php
include('panier.php');
include('db.php');
$n_post = $_GET['idprod'];
if(isset($n_post))
{
    echo '<script>alert("Supprimé"); </script>';
    echo $n_post;
    $username= $_SESSION['username'];
    $query2 = "Select id from acheteur where username = '$username'";
    $result2 = mysqli_query($con, $query2);
    $row = mysqli_fetch_array($result2);
    $id = $row['id'];
    
    $query = "DELETE FROM `panier` WHERE id_produit = '$n_post' and id_acheteur = '$id'";
    $result = mysqli_query($con, $query);
    
    
}


?>