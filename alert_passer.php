<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit(); 
  }
?>
<?php
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["login"]))
  {
    header("Location: login.php");
    exit(); 
  }

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css" />  
<!--<link href="../js/bootstrap.min.css" rel="stylesheet">  -->
</head>

<body>

    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['login']; ?>!</h1>
    <p>************************************************</p>
    <p>************************************************</p>

<?php    echo "vous ne pouvez pas faire ca";   ?>

                      <br>
                      <br>

        <a href="login.php">Reconnectez </a>

      

   
    </div>
  </body>
</html>