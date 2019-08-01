<?php 

session_start();
if ( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}
require 'function.php';


if (isset($_POST["submit"])) {

if (tambahadmin($_POST)> 0){
  echo "
  <script>
    alert('data successfully added!');
    document.location.href = 'accounts.php';
  </script>";
} else {
  echo "
  <script>
    alert('data failed to create!');
    document.location.href = 'accounts.php';
  </script>";
}

}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Network Monitoring System | PT Indonesia Comnets Plus</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">ICON+</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
 <a class="nav-item" href="logout.php" color: black data-toggle="modal" data-target="#logoutModal">
<i class="menu-icon mdi mdi-logout"></i>
                                Logout</a></form>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Entities</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          
          <a class="dropdown-item" href="customer.php">Customer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="pop.php">POP</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="device.php">Device</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="accounts.php">Admin Page</a>
          </div>
      </li>
       <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
        </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="charts.php">Received Internet</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="chartsg.php">Received Gateway</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="chartserver.php">Received Server</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="chartsavg.php">Average Internet</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="chartsavg2.php">Average Gateway</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="chartserveravg.php">Average Server</a>
          </div>
      </li> -->
       <li class="nav-item">
        <a class="nav-link" href="detailcust.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Detail Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables Event</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="Preconfig/PRECON_">
          <i class="fas fa-fw fa-book"></i>
          <span>Script Template</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>About</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
            
           <!--  a><strong><center>Dashboard</center></strong></a> -->
          </li>
          <li class="breadcrumb-item">
            <a href="accounts.php">Admins</a>
          </li>
          <li class="breadcrumb-item active">Add Admin</li>
        </ol>
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-plus-square"></i>
            Add Admin Data</div>
            <div class="card-body">
                      <form action="" method="post" enctype="multipart/form-data" class="forms-sample">
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Admin Email</label>
                          <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Admin Email" required="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="uname" class="col-sm-3 col-form-label">Admin Username</label>
                          <div class="col-sm-9">
                            <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter Admin Username" required="">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password" required="">
                          </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success mr-2"><i class="mdi mdi-file-document"></i>Submit</button>
                       
                      </form>
                  </div>
         </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          	<p>Copyright © </p>
            <a href="http://www.iconpln.co.id"><span>PT Indonesia Comnets Plus</span></a>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>
