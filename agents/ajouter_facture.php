<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
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

if (isset( $_POST['add']))
{ 

  $Nboc = $_POST['Nboc'];
  $Societe =$_POST['Societe'];
  $Montant =$_POST['Montant'];
  $Creation = isset($_POST['Creation']) ?    
  $_POST['Creation'] : date('Y-m-d');
  $Etape = $_POST['Etape'];
 
  if(mysqli_num_rows(mysqli_query(  $conn,"SELECT * FROM factures  WHERE Nboc='$Nboc'   " ))!=0 )
  {
          echo  '
          <div class="sucess">
          "Ce Numero de Facture BOC   est déjà assignéé à une autre facture, veuillez en choisir un autre svp."
            <br>
            cliquez ici pour Retourner
             <a href="ajouter_facture.php">Retour</a>   '  ;        
  } 
  else 
   {   
        $sql = "INSERT INTO factures (Nboc,Societe, Montant, Creation, Etape,Ordonnanceur) values('$Nboc', '$Societe', '$Montant', '$Creation', '$Etape','$Ordonnanceur')";
            $res = mysqli_query($conn, $sql);

            if($res)
            {
                echo "
                <script>alert('Add Success!')</script>";
                 header('location: Agent_BOC.php');
            }
 }
}

else

{
?>
<?php

?>

<?php
$societes  = mysqli_query($conn , 'SELECT societe From fournisseurs ORDER BY societe') 
?>


                        <br>

<div class="container">
<form  action="" method="post">
<fieldset>
<h1 class="box-title">Enregistrement facture</h1>  
<div class="form-group">
<input type="text" class="form-control" name="Nboc" placeholder="Nboc" required />
</div>
<label class="control-label" style="text-align: left;">Societe </label>

<div class="form-group">
  <select  class="form-control" name="Societe">
    <?php
      while ($d = mysqli_fetch_array($societes , MYSQLI_ASSOC ))
       { 
    ?>
   
     <option><?php echo '<td>'. $d['societe'] . '</td>' ; ?>   </option>
     <?php } ?> 
  </select>
</div>

<br>

<div class="form-group">
<input type="text" class="form-control" name="Montant" placeholder="Montant" required />
</div>  
  
<label class="box-title">Creation</label> 

<div class="form-group">  
<input type="datetime-local" name="Creation"  class="form-control"  value="  <?=date('Y-m-d')?>     " >
</div>
 
<label class="box-title">Etape</label>
<div class="form-group">
  <select class="form-control" name="Etape">
          <option value="BOC" required >Bureau d'Ordre Centrale</option> 
  </select>
</div>

 <br> 


<center>
<div class="form-group">
    <input type="submit" name="add"  value="ENREGISTRER LA FACTURE" class="btn btn-primary" />
</div>
  
      <legend>Pas maintenant? </legend>
  <a href="Agent_BOC.php" class ="btn btn_info">Retournez-vous ici</a>  
</center>
</fieldset>
</form>
</div>

<?php } ?>
<?php require('../pages/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>