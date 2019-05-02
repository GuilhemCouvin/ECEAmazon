<!DOCTYPE html>
<html>
  <head>
    <title>ECE Amazon - Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="login-v2.css" media = "all" />

    <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../../../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Modification du style  -->
    <link href="login-v2.css" rel="stylesheet">
    
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://use.fontawesome.com/1dec14be15.js"></script>
    <script src="https://use.fontawesome.com/1dec14be15.js"></script>
  </head>
  <body >

<!-- TRAITEMENT PHP -->
     <?php
    require('db.php');
    session_start();
    //If form submitted, insert values into the database.
    if (isset($_POST['username'])){
            //removes backslashes
      $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
      $username = mysqli_real_escape_string($con,$username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con,$password);
        $statut = $_REQUEST['statut'];
                
    if ($statut == "")
    {$statut = "admin";}

      //Checking is user existing in the database or not
            $query = "SELECT * FROM $statut WHERE username='$username'
    and password='".md5($password)."'";

        
      $result = mysqli_query($con,$query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
            if($rows==1){
                if($statut == 'vendeur')
                {
                    $_SESSION['username'] = $username;
                //Redirect user to index.php
                    header("Location: index_v.php");
                }
                else if($statut=='acheteur')
                {
                    $_SESSION['username'] = $username;
                //Redirect user to index.php
                    header("Location: index.php");
                }
                else
                {
                    echo("vous etes admin");
                }
          
             }else{
      echo "<div class='container-fluid stylish-form'>
                 <div class='inner-section3'>
    <h2 align = 'center'>username/password is incorrect.</h2>
    <br/><center><a href='login.php'>Login</a></center></div></div>";
      }
        }else{
    ?>
<!-- FIN TRAITEMENT PHP -->

<!-- FENETRE CONNECTION -->
    <div class="container-fluid stylish-form">

      <h2 align = "center">Bienvenue sur ECE Amazon</h2>
      <div class="row mar20" >
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="inner-section">
            <form action="" method="post" >
              <div class="mar20 inside-form">
                <h2 class="font_white text-center">CONNEXION</h2><br>

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope "></i></span>
                  <input type="text" class="form-control" name="username" placeholder="Pseudo..." required/>
                </div>

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock "></i></span>
                  <input type="password" class="form-control" name="password" placeholder="Password..." required/>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="statut" value="vendeur">
                        <label class="custom-control-label" for="defaultInline1">Vendeur</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="defaultInline1" name="statut" value="acheteur">
                      <label class="custom-control-label" for="defaultInline1">Acheteur</label>
                </div>

                <div class="footer text-center">
                    <button class = "btn btn-neutral btn-round ">Connexion</button>
                </div>
              </div>
            </form>

            <h3 class="font_white text-center" align ="center" >Pas encore inscrit ? <br><a href='choix.php'>Register Here</a></h3><br>
          </div><br><br><br><br>

          <footer align = "center" font-size = "small">Copyright © 2018-2019 ECE Paris</footer>
        </div>
      </div>
    </div>

    <?php } ?>
  </body>
</html>
