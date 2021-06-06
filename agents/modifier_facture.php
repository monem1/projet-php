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
if (!isset($_SESSION['login'])) {
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
    <?php require('../pages/sidebaragent.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require('../pages/navbar.php'); ?>
        <!-- End of Topbar -->
        <?php
        require('../connexion/config.php');

        //$societe = '';
        $montant = '';

        if (isset($_POST['update'])) {
          $id = $_POST['id'];
          //$societe = $_POST['Societe'];
          $montant = $_POST['Montant'];
          //updating the table   societe='$societe',
          $result = mysqli_query($conn, "UPDATE factures SET  montant='$montant'  WHERE id=$id");
          header("Location: Agent_BOC.php");
          exit();
        }



        ?>
        <?php

        $id = $_GET['id'];

        //selecting data associated with this particular id
        $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          // $societe = $row['Societe'];
          $montant = $row['Montant'];
        }

        ?>
        <div class="container">
          <form action="modifier_facture.php" method="post">
            <fieldset>
              <!--   <legend> Modifier le  Montant De La  Facture  </legend> -->
              <h3> Modifier Le Montant De La Facture </h3>
              <div class="form-group" id="app1">
              {{sorce}}
                <input type="number" min="0" class="form-control" name="Montant" value="<?php echo $montant; ?> " placeholder="Montant" v-model="sorce" required />
              </div>
              <div class="form-group">
                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                <input type="submit" name="update" value="Modifier" class="btn btn-primary" />
              </div>
              <a href="Agent_BOC.php" class="btn btn_info">Retournez-Vous Ici</a>
            </fieldset>
          </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        var app1 = new Vue({
            el: '#app1',
            data: {
                sorce: ''
            }
        })
        </script>
</body>

</html>