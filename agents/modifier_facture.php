<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
 
<?php
if(!isset($_SESSION['login'])) {
    header('Location: ../login.php');
}
?>

<!DOCTYPE html>
<html>
<?php require('../pages/header.php') ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('../pages/sidebaragent.php') ;?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('../pages/navbar.php');?>
                <!-- End of Topbar -->
<?php
require('../connexion/config.php');

$societe = '';
$montant = '';
    
  if (isset($_POST['update'] ))
  {
  $id = $_POST['id'] ;
  $societe = $_POST['Societe'];
  $montant = $_POST['Montant'];
        //updating the table
        $result = mysqli_query($conn,"UPDATE factures SET societe='$societe', montant='$montant'  WHERE id=$id");
          header("Location: Agent_BOC.php");
             exit();

      
}



?>
<?php

      $id = $_GET['id'];
 
      //selecting data associated with this particular id
      $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");
 
    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{

  $societe = $row['Societe'];
  $montant = $row['Montant'];
    
}

?>

<br>

<div class="container">


<form  action="modifier_facture.php" method="post">
 
  <center>
<fieldset>
    <legend> Modifierde la  Facture  </legend>

<div class="form-group">
    <input type="text" class="form-control" name="Societe"  value="<?php echo $societe ; ?> "
  placeholder="Societe" required />
</div>


<div class="form-group">
   <input type="text" class="form-control" name="Montant"  value="<?php echo $montant ; ?> " 
  placeholder="Montant" required  />
</div>

  </div>  

  <br><br>
  
<center>
  <div class="form-group">
  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>    > 
    <input type="submit" name="update" value="Modifier la Facture" class="btn btn-primary" />
</div>



  
    <legend>Pas maintenant? </legend>
  <a href="Agent_BOC.php" class ="btn btn_info">Retournez-vous ici</a></p> 

</center>
</fieldset>
</form>
</div>

</body>
</html>