<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<?php require('../connexion/config.php');
    $id = 0;
    if ( !empty($_GET['id']) ) 
    {
        $id = $_REQUEST['id'];
    }
     
        if ( !empty($_POST)) 
        {
          $id = $_POST['id'];
        // delete data
       $result=mysqli_query($conn, "DELETE FROM factures WHERE id=$id");
      header("Location: gestion_factures.php");
         
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet" >
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                                 <br>
                    <center>
                        <h3>Supprimer une Facture</h3>
                    </center>
                     
 <form class="form-horizontal" action="supprimer_Facture.php" method="post">

  <input type="hidden" name="id" value="<?php echo $id;?>"/>
 <p class="alert alert-error">Etes vous sur de supprimer la facture ?</p>

    <div class="form-actions">
    <button type="submit" class="btn btn-danger">Oui</button>
    <a class="btn btn-info" href="gestion_factures.php">Non</a>
    </div>
</form>
  </div>
                 
    </div> 
  </body>
</html>