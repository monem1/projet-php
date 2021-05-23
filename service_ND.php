<?php
session_start();  // Initialiser la session
  
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
</head>

<body>

    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['login']; ?>!</h1>
    <p>************************************************</p>
    <p>************************************************</p>

<?php    echo "Service Non Disponible Pour Le Moment";   ?>

                      <br>
                      <br>

        <a href="login.php">Reconnectez </a>

      
   
    </div>
  </body>
</html>