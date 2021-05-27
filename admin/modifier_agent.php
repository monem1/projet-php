<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['login'])) 
{
    header('Location: ../login.php');
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
$login = '';
$fonction = '';
$type = '';
$password = '';


if (isset($_POST['update'] ))
{
$id = $_POST['ida'] ;
$login = $_POST['login'];
$fonction = $_POST['fonction'];
$type = $_POST['type'];
$password = md5($_POST['password']);

//updating the table type='$type'
$result = mysqli_query($conn, "UPDATE agents SET login='$login', fonction='$fonction'  , type='$type' , password= ' $password'    WHERE ida=$id");    
header("Location: gestion_agents.php");  
}

?>



<?php
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM agents WHERE ida=$id");

while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{
$login = $row['login'];
$fonction = $row['fonction'];
$type = $row['type'];
$password = $row['password'];
}
?>
<h1 class="box-title">Modifier agent <?php echo $login ; ?> </h1> 
                      <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="login" name="login" value="<?php echo $login ; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="fonction" name="fonction" value="<?php echo $fonction ; ?> " required>
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
                                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?> > 
                                        <input type="submit" name="update" class="btn btn-primary btn-user btn-block" value="modifier agent">
                                    </div>
                                    </div>
                       </form>
</body>
</html>