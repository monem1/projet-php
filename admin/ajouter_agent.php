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
<?php require('../pages/header.php');?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('../pages/sidebar.php') ;?>
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

if(isset($_POST['add']))
{
$login = $_POST['login'];
$fonction =$_POST['fonction'];
$password =$_POST['password'];
$type = $_POST['type'];
      if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM agents WHERE login='$login'")) !=0 )
      {
        echo"<script>alert(oki)</script>";
        echo '<a href="gestion_agents.php">Retour</a> '  ;
      }
      else 
      {
        $query = "INSERT into `agents` (login, fonction, type,  password) VALUES ('$login', '$fonction', '$type', '$password')";
        $result = mysqli_query($conn, $query);
                  if($result)
                  {
                    header("Location: gestion_agents.php");
                  }
      }
    
}
else
{
?>
                     <h1 class="box-title">Ajouter un agent</h1> 
                      <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="login" name="login" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="fonction" name="fonction" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                      <select class="custom-select" name="type" id="type" required >
                                        <option value="" disabled selected>Type</option>
                                        <option value="Agent">Agent</option> 
                                        <option value="Ordonnanceur">Ordonnanceur</option>
                                      </select>
                                    </div>
                                   </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="submit" name="add" class="btn btn-primary btn-user btn-block" value="ajouter un utilisateur">
                                    <a href="gestion_agents.php" class ="btn btn_info">Retournez-vous ici</a>
                                    </div>
                                     </div>
                       </form>
<?php 
}
?>
<?php require('../pages/footer.php');?>
</body>
</html>