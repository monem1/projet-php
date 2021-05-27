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
            $result=mysqli_query($conn, "DELETE FROM agents WHERE ida=$id");
            header("Location: gestion_agents.php");
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

<div class="container">
                <div class="span10 offset1">
                                 <br>
                    
                        <h3>Supprimer Agent</h3>
                  

 <form class="form-horizontal" action="supprimer_agent.php" method="post">

<input type="hidden" name="id" value="<?php echo $id;?>"/>
 <p class="alert alert-error">Etes vous sur de supprimer l'agent ?</p>

<div class="form-actions">
<button type="submit" class="btn btn-danger">Oui</button>
<a class="btn btn-info" href="gestion_agents.php">Non</a>
</div>
</form>
</div>
                 
</div> 
</body>
</html>