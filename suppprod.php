<?php
include('supprimer_produit.php');
include('db.php');
$n_post = $_GET['idprod'];
if(isset($n_post))
{
    echo '<script>alert("Supprimé"); </script>';
    echo $n_post;
    $username= $_SESSION['username'];

    $query = "DELETE FROM `produit` WHERE id = $n_post";
    $result = mysqli_query($con, $query);
    
    //echo $username;
    
}


?>