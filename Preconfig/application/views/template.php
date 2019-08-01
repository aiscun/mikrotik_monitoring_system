<?php 
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
  <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/iconfonts/mdi/css/materialdesignicons.min.css">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="indexc.php">ICON+</a>

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
        <a class="nav-link" href="../indexc.php">
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
          
          <a class="dropdown-item" href="../customer.php">Customer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../pop.php">POP</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../device.php">Device</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../accounts.php">Admin Page</a>
          </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../detailcust.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Detail Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables Event</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="PRECON_">
          <i class="fas fa-fw fa-book"></i>
          <span>Script Template</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../about.php">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>About</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
                  <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../indexc.php">Dashboard</a>
          </li>
         
          <li class="breadcrumb-item active">Mikrotik Script Template</li>
        </ol>
        <div class="row">
        <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">Add New Script Mikrotik
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('PRECON_');  ?>
                                <form>
                                    <tr><?php echo $form_kosong;?></tr>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Customer ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Customer ID" name="customer_id"
                                                                                                id = "customer_id" value="<?php echo set_value('customer_id') ?>">
                                            </div>
                                             <div class="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Customer Name" name="name"
                                                                                                id = "name" value="<?php echo set_value('name') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>POP ID</label>
                                                <input type="text" class="form-control" placeholder="Enter POP ID" name="pop_id"
                                                                                                id = "pop_id" value="<?php echo set_value('pop_id') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Device ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Device ID" name="device_id"
                                                                                                id = "device_id" value="<?php echo set_value('device_id') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>IP Gateway</label>
                                                <input type="text" class="form-control" placeholder="Enter IP Gateway" name="ip_gateway"
                                                                                                id = "ip_gateway" value="<?php echo set_value('ip_gateway') ?>">
                                            </div>
                                        </div>
                             
                                    </div>


                  <button type="submit" class="btn btn-info btn-fill pull-right" name="submit_form" value="input_precon">Submit</button>
                 
                                </form>
                          
                        </div>
                    </div>
</div>
<div class="col-lg-6">
                     <div class="card mb-3">
                            <div class="card-header">Configuration Template
                            </div>
                            <div class="card-body">


                 
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $hasil_Zyxel; ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo form_close();?>
                            </div>
                          </div>
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
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>

</body>

</html>
