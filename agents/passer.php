<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
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
                <div class="container-fluid"> 
<?php
require('../connexion/config.php');


 $etape = '';


if (isset($_POST['update'] ))
{

    $id = $_POST['id'] ;
    $Etape = $_POST['Etape'];

          if($_SESSION["login"]=="BOC")
          {
                  if  ($Etape  == "TRI" )
                //updating the table  
                  { 
                  $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");
                  header("Location:Agent_BOC.php");
                  }   
                  else
                  {
                      echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_BOC.php">Retour a votre espase</a></button>
                     ';
                  exit();
                  }
          }

          if($_SESSION["login"]=="TRI")
          {

                if ($Etape  == "BOC" or $Etape  ==  "ORD" or $Etape  ==  "CONT" )
                //updating the table  
                {
                  $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location:Agent_TRI.php");
                }

                else

                {

                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_TRI.php">Retour a votre espase</a></button>';
                 exit();
                }
          }
          if($_SESSION["login"]=="APPRO_BDC")
          {
                if  ($Etape  == "ORD" or $Etape  ==  "CONT" )
                //updating the table  
                {
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");
                header("Location:Agent_APPRO.php");
                }
                else
                {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_APPRO.php">Retour a votre espase</a></button>';
                 exit();
                }
          }
          if($_SESSION["login"]=="CON")
          {
                if  ($Etape  == "TRI"  or $Etape  ==  "ORD" or $Etape  ==  "APPRO_BDC"or $Etape  ==  "COMP")
                //updating the table  
                {
                    $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");
                header("Location: Agent_CON.php");
                }
                else
                {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_CON.php">Retour a votre espase</a></button>';
                     exit();
                }
          }
          if($_SESSION["login"]=="COM")
          {
                if  ($Etape  == "CONT"  or $Etape  ==  "TRESO" )
                //updating the table  
                {
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: Agent_COM.php");
                }
                
                else
                
                {  
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_COM.php">Retour a votre espase</a></button>';
                     exit();
                }
            }
          if($_SESSION["login"]=="TRE")
          {
                if  ($Etape  == "COMP"  or $Etape  ==  "PDG" )
                //updating the table  
                {
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: Agent_TRE.php");
                }
                else
                {  
                echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'vous ne pouvez pas faire ca!',
                      })</script>";
                     echo ' 
                     <button type="button" class="btn btn-danger"><a href="Agent_TRE.php">Retour a votre espase</a></button>';
                     exit();
                }
          }
        }
          ?>
          <?php

$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");

while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{

$etape = $row['Etape'];

}

?>
<h1 class="box-title">Affectation des factures</h1> 
<form class="user" method="POST" action="passer.php">
<div class="form-group row" >
<div class="col-sm-6">
<select class="custom-select" name="Etape" id="etape" required >
<option value="BOC">Bureau d'Ordre Centrle</option>  
<option value="TRI">Bureau de TRI</option> 
<option value="ORD">ORDONNANCEURS</option>  
<option value="APPRO_BDC">APPRO_BDC</option>    
<option value="CONT">Bureau de Controle</option>  
<option value="COMP">Bureau de Comptabilité</option> 
<option value="TRESO">Bureau de Trésorerie</option>
<option value="PDG">Signature PDG</option>
</select>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6 mb-3 mb-sm-0">
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>    > 
<input type="submit" name="update" class="btn btn-primary btn-user btn-block" value="Passer Etape">
</div>
</div> 
</form>
</div>
      </div>
      <!-- End of Main Content -->
      
      <!-- Footer -->
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