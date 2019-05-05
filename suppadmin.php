<?php
include('admin.php');
include('db.php');

$n_post1 = $_GET['name1'];
if(isset($n_post1))
{
    echo '<script>alert("Admin supprimé"); </script>';
    
    $query = "DELETE FROM admin WHERE username = '$n_post1'";
    $result = mysqli_query($con, $query);
}

$n_post2 = $_GET['name2'];
if(isset($n_post2))
{
    echo '<script>alert("Acheteur supprimé"); </script>';
    
    $query = "DELETE FROM acheteur WHERE id = '$n_post2'";
    $result = mysqli_query($con, $query);
}

$n_post3 = $_GET['name3'];
if(isset($n_post3))
{
    echo '<script>alert("Vendeur supprimé"); </script>';
    
    $query = "DELETE FROM vendeur WHERE id = '$n_post3'";
    $result = mysqli_query($con, $query);
}

$n_post4 = $_GET['name4'];
if(isset($n_post4))
{
    echo '<script>alert("Produit supprimé"); </script>';
    
    $query = "DELETE FROM produit WHERE id = '$n_post4'";
    $result = mysqli_query($con, $query);
}

$n_post5 = $_GET['name5'];
$n_post8 = $_GET['name8'];
if(isset($n_post5))
{
    echo '<script>alert("Produit du panier supprimé"); </script>';

    $query = "DELETE FROM panier WHERE id_produit = '$n_post5' and id_acheteur = '$n_post8'";
    $result = mysqli_query($con, $query);
}

$n_post6 = $_GET['name6'];
if(isset($n_post6))
{
    echo '<script>alert("Produit vendu supprimé"); </script>';
    
    $query = "DELETE FROM produit_vendu WHERE id = '$n_post6' ";
    $result = mysqli_query($con, $query);
}

$n_post7 = $_GET['name7'];
$n_post9 = $_GET['name9'];
if(isset($n_post7))
{
     echo '<script>alert("Carte Bancaire supprimée"); </script>';
    
    $query = "DELETE FROM cb WHERE numero = '$n_post7' AND codeS='$n_post9'";
    $result = mysqli_query($con, $query);
}

?>