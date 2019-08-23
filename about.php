<?php 

session_start();
if ( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}
require 'function.php';

$customers = query("SELECT * FROM customer");


 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Network Monitoring System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/faqq.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <a class="nav-item" href="logout.php" color: black data-toggle="modal" data-target="#logoutModal">
<i class="menu-icon mdi mdi-logout"></i>
                                Logout</a>
    </form>



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

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
           <!--  a><strong><center>Dashboard</center></strong></a> -->
          </li>
          <li class="breadcrumb-item active">FAQ</li>
        </ol>
        <div class="row">
<div class="col-lg-12">
	<div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-question"></i><strong>
             Frequently Asked Questions (FAQ)</strong></center></div>
            <div class="card-body">
<section class="faq">
  
   <div class="faq-left">
        <ul class="faq-container">


            <li>
              <label for="q1">Q : Bagaimana gambaran umum mengenai website monitoring ini? </label> <input name="question" id="q1" type="checkbox" value="">
              <div class="answer">
                <p>A : Website ini bertujuan untuk memonitoring router mikrotik yang berada di sisi user PT ICON+. Kondisi perangkat yang dimonitor akan dikirim ke telegram dan database dalam interval waktu tiap 15 menit. Selain itu, website ini juga akan menampilkan grafik ping dari perangkat user ke internet, gateway, dan ke server.</p>
              </div>
            </li>

            <li>
              <label for="q2">Q : Apakah website ini memonitoring perangkat Mikrotik secara real time? </label> <input name="question" id="q2" type="checkbox" value="">
              <div class="answer">
                <p>A : Ya, website ini memonitoring perangkat mikrotik secara real time dengan mengirimkan pesan notifikasi ke telegram tiap 15 menit sekali. Untuk grafik yang ditampilkan di dalam website berisi data monitoring last 5 and last 24 hours dari kondisi perangkat yang dimonitoring.</p>
              </div>
            </li>

            <li>
              <label for="q4">Q : Bagaimana jika kondisi perangkat down? </label> <input name="question" id="q4" type="checkbox" value="">
              <div class="answer">
                <p>A :  Jika kondisi perangkat down, maka telegram akan berhenti menerima pesan notifikasi tetapi database akan tetap menerima data yang berisi nilai 0 yang menandakan bahwa perangkat tersebut down.</p>
              </div>
            </li>

            <li>
              <label for="q3">Q : Siapa yang membuat website ini? </label> <input name="question" id="q3" type="checkbox" value="">
              <div class="answer">
                <p>A : Aisyah Ekayanti</p>
              </div>
            </li>

            
        </ul>

  </div>
</section>
</div>
</div>
</div>

<div class="col-lg-6">
	<div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-bezier-curve"></i><strong>
              TOPOLOGY</strong></center></div>
            <div class="card-body">
<section class="faq">
  
   <div class="faq-left">
        <ul class="faq-container">
          <img width=500 height=400 src='image/topologi.png' />
        </ul>

  </div>
</section>
</div>
</div>
</div>

<div class="col-lg-6">
  <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-info"></i><strong>
               ABOUT THIS WEBSITE</strong></center></div>
            <div class="card-body">
<section class="faq">
  <font face="Consolas" size="4"><strong>
    Gambaran Umum Website Monitoring Mikrotik</strong>
</font><br/>

   <div class="faq-left">
        <ul class="faq-container">
          <font face="Courier New" size="3"><strong>
## Menu Dashboard ##</strong></font><br/>
<font face="Consolas" size="3">
Menampilkan kondisi terbaru dari perangkat yang dimonitoring.</font><br/>
<br>
<font face="Courier New" size="3"><strong>
## Menu Entities ##</strong></font><br/>
<font face="Consolas" size="3">
Menampilkan tabel admin, customer, device, dan pop.</font><br/>
<br>
<font face="Courier New" size="3"><strong>
### Menu Detail Chart ##</strong></font><br/>
<font face="Consolas" size="3">
Menampilkan detail chart kondisi perangkat dari setiap user.</font><br/>
<br>
<font face="Courier New" size="3"><strong>
## Menu Tabel Event ##</strong></font><br/>
<font face="Consolas" size="3">
Menampilkan tabel berisi parameter yang telah dimonitoring</font><br/>
<font face="Consolas" size="3">dari perangkat milik user.</font><br/>
<br>
<font face="Courier New" size="3"><strong>
## Menu About ##</strong></font><br>
<font face="Consolas" size="3">
Menampilkan gambaran umum dari website yang telah dibuat.</font><br/>
        </ul>

  </div>
</section>
</div>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
