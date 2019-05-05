<?php
include('panier.php');
include('db.php');
$n_post = $_GET['name'];
if(isset($n_post))
{
    echo '<script>alert("Supprimé"); </script>';
    $username= $_SESSION['username'];
    $query2 = "SELECT id FROM acheteur WHERE username = '$username'";
    $result2 = mysqli_query($con, $query2);
    $row = mysqli_fetch_array($result2);
    $id = $row['id'];
    
    $query = "DELETE FROM panier WHERE id_produit = '$n_post' and id_acheteur = '$id'";
    $result = mysqli_query($con, $query);
}
?>