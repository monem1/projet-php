<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>suivie factures</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php 
session_start();
include('connexion/config.php');


if ( isset($_REQUEST['login'], $_REQUEST['societe'], $_REQUEST['password'])  )
{
// récupérer login 
$login = stripslashes($_REQUEST['login']);
$login = mysqli_real_escape_string($conn, $login); 
// récupérer societe 
$societe = stripslashes($_REQUEST['societe']);
$societe = mysqli_real_escape_string($conn, $societe);
// récupérer  mot de passe 
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);


      if( isset($_POST['submit']))
      {
		  $sql = "insert into fournisseurs(login,societe,password) values('$login', '$societe','$password')";
		  $res=$conn->query($sql);
		  
      $sql1="select idf from fournisseurs where login='$login'";
      $result=$conn->query($sql1);

                if($result)
                {
                echo "<div class='sucess'>
                <h3>Vous êtes nouveau Fournisseur inscrit avec succès.</h3>
                <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                </div>";
                }

      $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
      $_SESSION['login']=$login;
      $_SESSION['type']='Fournisseur';
		  $_SESSION['id']=$row['idf'];
      }


}

else

{
?>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                        <span >AgenceTransport<span>Terrestre</span> </span>
                        <img src="img/images.jpeg" alt="attt">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">S'inscrire</h1>
                                </div>
                                <form class="user" method="post" name="login">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp" name="login"
                                            placeholder="Enter login..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="societe" placeholder="societe..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="	societe" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                    <input type="submit"   class="btn btn-primary btn-user btn-block" name="submit" value="S'inscrire " >
                                </form>
                                <hr>
                                <div class="text-center">
                                <a class="small" href="login.php">Vous avez déjà un compte? Connexion!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} 
?>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>



 