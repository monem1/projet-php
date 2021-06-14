<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit();
}
?>
<?php
//require('../connexion/fonction_bare_des_pages.php');
?>

<!DOCTYPE html>
<html>
<?php require('../pages/header.php'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require('../pages/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require('../pages/navbar.php'); ?>
        <!-- End of Topbar -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">liste des agents</h6>
              <br>
              <div class="container">
                <a href="ajouter_agent.php" class="btn btn-primary">Ajouter un agent</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>fonction</th>
                        <th>type</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // on se connecte à notre base
                      include '../connexion/config.php';
                      $sql = "SELECT * FROM agents ";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {


                      ?>
                          <tr>
                            <td><?php echo $row['ida']; ?></td>
                            <td><?php echo $row['login']; ?></td>
                            <td><?php echo $row['fonction']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><a class="btn btn-info btn-circle btn-sm" href="modifier_agent.php?id=<?php echo $row['ida']; ?>">
                                <i class="fas fa-edit"></i></a></td>
                            <td><a href="supprimer_agent.php?id=<?php echo $row['ida']; ?>" class='btn btn-danger btn-circle btn-sm'>
                                <i class="fas fa-trash"></i>
                              </a></td>
                          </tr>
                      <?php
                        } //while condition closing bracket
                      }  //if condition closing bracket
                      ?>
                  </table>
                  <?php
                  if (isset($_GET['m'])) { ?>
                    <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
                  <?php } ?>
                  <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                  </a>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!-- Footer -->
          <?php require('../pages/footer.php') ?>
          <!-- End of Footer -->
        </div>
        <?php require('../pages/formlogout.php') ?>

</body>

</html>