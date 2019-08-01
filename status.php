<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

  $connection = mysqli_connect("localhost", "root", "", "iconbisa");
  if(isset($_POST['status'])){
    $customer_id = $_POST['detail_cust'];

    $query="SELECT event.*, device.*, customer.*, pop.* FROM event
        INNER JOIN customer ON event.customer_id=customer.customer_id 
        INNER JOIN pop ON event.pop_id=pop.pop_id
        INNER JOIN device ON event.device_id=device.device_id
        WHERE event.customer_id='$customer_id'
        ORDER BY event_id DESC";
    $query_run= mysqli_query($connection, $query);
    if (!$query_run)
      echo(mysqli_error($connection));

     if(mysqli_num_rows($query_run)>0){
                  $row = mysqli_fetch_array($query_run);
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
  <script type="text/javascript" src="js/Chart.js"></script>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">ICON+</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <a class="nav-item" href="logout.php">
     <span class="mr-2 d-none d-lg-inline text-gray-600 small">
    </a></form>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">      
    <a class="nav-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
    <i class="menu-icon mdi mdi-logout"></i>Logout</a></form>
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
          
          </li>
          <li class="breadcrumb-item active">Last Status From User <?php echo $row['customer_name']; ?></li>
        </ol>

        <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-cogs"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php 
                  echo $row['pcpuL'];
                  ?> %
                </font>
             </div>
              <a class="card-footer text-white clearfix large z-1">
                <span class="float-left"><font face="Consolas" size="3"><strong>CPU LOAD</strong></font></span>             
              </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-dice-d6"></i>
              </div>
                <font face="Consolas" size="6">
                   <?php 
                 echo $row['uptime'];
                  ?>
                </font>
             </div>
              <a class="card-footer text-white clearfix large z-1">
                <span class="float-left"><font face="Consolas" size="3"><strong>UPTIME</strong></font></span>
             
              </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-temperature-low"></i>
              </div>
                <font face="Consolas" size="6">
                   <?php 
                   echo $row['parameter1'];
                    ?> Celcius
                </font>
             </div>
              <a class="card-footer text-white clearfix large z-1">
                <span class="float-left"><font face="Consolas" size="3"><strong>LAST TEMPERATURE</strong></font></span>
             
              </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-bolt"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php 
                  echo $row['parameter2'];
                  ?> Volt
                </font>
            </div>
              <a class="card-footer text-white clearfix large z-1">
                <span class="float-left"><font face="Consolas" size="3"><strong>LAST VOLTAGE</strong></font></span>
             
              </a>
          </div>
        </div>

      </div>
      <div class="row">

                <div class="col-lg-6">
          <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-chart-area"></i>
              <strong>LAST RECEIVED PING</strong></center>
          </div>
            <div class="card-body">
              <style type="text/css">
                body {
                  table {margin: 0px auto;}
                  </style>
                    <div style="width: 400px;margin: 0px auto;">
                      <canvas id="myChart"></canvas>
                    </div>
                      <br/>
                      <br/>
<?php 
$rec1 = '';
$rec2 = '';
$rec3 = '';
$time = '';
$date = '';

$query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 1";
$results= mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($results)) {
$received1 = $row['p6receive'];
$received2 = $row['p7receive'];
$received3 = $row['p8receive'];
$times = $row['time1'];
$dates = $row['date1'];

$rec1 = $rec1.$received1.',';
$rec2 = $rec2.$received2.',';
$rec3 = $rec3.$received3.',';
$time = $time.$times.',';
$date = $date.$dates.',';
}
$rec1 = trim($rec1, ",");
$rec2 = trim($rec2, ",");
$rec3 = trim($rec3, ",");
$time = trim($time, ",");
$date = trim($date, ",");

?>
                              <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [
                                      "Google", "Gateway", "Server"
                                      ],
                                      datasets: [{
                                      label: "Sent: 10; Received",
                                      data: [
                                      <?php echo $rec1; ?>,
                                      <?php echo $rec2; ?>,
                                       <?php echo $rec3; ?>
                                      ], 
                                      backgroundColor: 'rgba(255, 99, 132, 0.4)',
                                      borderColor: 'rgba(255,99,132,1)',
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      xAxes: [{
                                        time: {
                                          unit: 'date'
                                        },
                                        gridLines: {
                                          display: false
                                        },
                                        ticks: {
                                          maxTicksLimit: 10
                                        }
                                      }],
                                      yAxes: [{
                                        ticks: {
                                          min: 0,
                                          max: 20,
                                          maxTicksLimit: 10
                                        },
                                        gridLines: {
                                          color: "rgb(0, 0, 0, .125)",
                                        }
                                      }],
                                    },
                                    legend: {
                                      display: false
                                    }
                                  }
                                });
                        </script>
                        <font face="Consolas" size="2">Last update : <font face="Consolas" size="2">  <?php echo $date; ?><?php echo ", "; ?><?php echo $time; ?> WITA</font></font></br>
                   
                  <?php
                  $query = "SELECT * FROM event WHERE customer_id='$customer_id' AND parameter1='0'";
                  $results = mysqli_query($connection, $query);
                  $jumlah_customer = mysqli_query($connection, "select * from event where customer_id='$customer_id' and parameter1='0'");
                  $x = mysqli_num_rows($jumlah_customer); 
                  $presentase = round($x/672 * 100,2);

                  $rec = '';
                  $rec1 = '';
                  $rec2 = '';           
                  $receive="SELECT AVG(p6receive) AS receive FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $receive_run=mysqli_query($connection, $receive);
                  while($row = mysqli_fetch_array($receive_run)){
                  $a = $row['receive'];
                  $rec = $rec.$a.',';
                  }
                  $rec = trim($rec, ",");

                  $receive1="SELECT AVG(p7receive) AS receive FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $receive_run=mysqli_query($connection, $receive1);
                  while($row = mysqli_fetch_array($receive_run)){
                  $a = $row['receive'];
                  $rec1 = $rec1.$a.',';
                  }
                  $rec1 = trim($rec1, ",");

                  $receive2="SELECT AVG(p8receive) AS receive FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $receive_run=mysqli_query($connection, $receive2);
                  while($row = mysqli_fetch_array($receive_run)){
                  $a = $row['receive'];
                  $rec2 = $rec2.$a.',';
                  }
                  $rec2 = trim($rec2, ",");

                  $angka = number_format($rec);
                  $angka1 = number_format($rec1);
                  $angka2 = number_format($rec2);
                  ?>
                  <font face="Consolas" size="2">Persentase down in a week : </font><font face="Consolas" size="2" style="background-color: red; color: white"><?php echo $presentase."%"; ?></font>
                  </br>
                  </br>

                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr style="background-color: grey">
                          <th colspan="3"><font face="Consolas" size="3"><center>
                            Average received in a day</center></font>
                          </th>
                        </tr>
                        <tr style="background-color: grey">
                          <th><font face="Consolas" size="3"><center>Received to Google</center></font></th>
                          <th><font face="Consolas" size="3"><center>Received to Gateway</center></font></th>
                          <th><font face="Consolas" size="3"><center>Received to Server</center></font></th>
                        </tr>
                          
                      </thead>
                      <tbody>
                    
                        <tr>
                           <td><font face="Courier New" size="3"><center>
                            <?php echo $angka; ?></center></font>
                          </td>
                          <td><font face="Courier New" size="3"><center>
                            <?php echo $angka1; ?></center></font>
                          </td>
                          <td><font face="Courier New" size="3"><center>
                            <?php echo $angka2; ?></center></font>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
            </div>                    
        </div>
      </div>

              <div class="col-lg-6">
          <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-chart-area"></i>
              <strong>LAST AVERAGE PING</strong></center>
          </div>
            <div class="card-body">
              <style type="text/css">
                body {
                  table {margin: 0px auto;}
                  </style>
                    <div style="width: 400px;margin: 0px auto;">
                      <canvas id="myChart20"></canvas>
                    </div>
                      <br/>
                      <br/>
<?php 
$avg1 = '';
$avg2 = '';
$avg3 = '';
$time = '';
$date = '';


$query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 1";
$results= mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($results)) {
$average1 = $row['p6avg'];
$average2 = $row['p7avg'];
$average3 = $row['p8avg'];
$times = $row['time1'];
$dates = $row['date1'];

$avg1 = $avg1.$average1.',';
$avg2 = $avg2.$average2.',';
$avg3 = $avg3.$average3.',';
$time = $time.$times.',';
$date = $date.$dates.',';
}

$avg1 = trim($avg1, ",");
$avg2 = trim($avg2, ",");
$avg3 = trim($avg3, ",");
$time = trim($time, ",");
$date = trim($date, ",");

?>
                              <script>
                                var ctx = document.getElementById("myChart20").getContext('2d');
                                var myChart20 = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                    labels: [
                                      "Google", "Gateway", "Server"
                                      ],
                                      datasets: [{
                                      label: "Average",
                                      data: [
                                      <?php echo $avg1; ?>,
                                      <?php echo $avg2; ?>,
                                       <?php echo $avg3; ?>
                                      ], 
                                      backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                      borderColor: 'rgba(54, 162, 235, 1)',
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      xAxes: [{
                                        time: {
                                          unit: 'date'
                                        },
                                        gridLines: {
                                          display: false
                                        },
                                        ticks: {
                                          maxTicksLimit: 10
                                        }
                                      }],
                                      yAxes: [{
                                        ticks: {
                                          min: 0,
                                          max: 80,
                                          maxTicksLimit: 10
                                        },
                                        gridLines: {
                                          color: "rgb(0, 0, 0, .125)",
                                        }
                                      }],
                                    },
                                    legend: {
                                      display: false
                                    }
                                  }
                                });
                        </script>
                        <font face="Consolas" size="2">Last update : <font face="Consolas" size="2">  <?php echo $date; ?><?php echo ", "; ?><?php echo $time; ?> WITA</font></font></br>
                         <?php 
                  $query = "SELECT * FROM event WHERE customer_id='$customer_id' AND parameter1='0'";
                  $results = mysqli_query($connection, $query);
                  $jumlah_customer = mysqli_query($connection, "select * from event where customer_id='$customer_id' and parameter1='0'");
                  $x = mysqli_num_rows($jumlah_customer); 
                  $presentase = round($x/672 * 100,2);

                  $avgs = '';
                  $avgs1 = '';
                  $avgs2 = '';           
                  $avg="SELECT AVG(p6avg) AS average FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $avg_run=mysqli_query($connection, $avg);
                  while($row = mysqli_fetch_array($avg_run)){
                  $a = $row['average'];
                  $avgs = $avgs.$a.',';
                  }
                  $avgs = trim($avgs, ",");

                  $avg1="SELECT AVG(p7avg) AS average FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $avg_run=mysqli_query($connection, $avg1);
                  while($row = mysqli_fetch_array($avg_run)){
                  $a = $row['average'];
                  $avgs1 = $avgs1.$a.',';
                  }
                  $avgs1 = trim($avgs1, ",");

                  $avg2="SELECT AVG(p8avg) AS average FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 96";
                  $avg_run=mysqli_query($connection, $avg2);
                  while($row = mysqli_fetch_array($avg_run)){
                  $a = $row['average'];
                  $avgs2 = $avgs2.$a.',';
                  }
                  $avgs2 = trim($avgs2, ",");

                  $angka = number_format($avgs);
                  $angka1 = number_format($avgs1);
                  $angka2 = number_format($avgs2);
                  ?>

                  <font face="Consolas" size="2">Persentase down in a week : </font><font face="Consolas" size="2" style="background-color: red; color: white"><?php echo $presentase."%"; ?></font>
                </br>
             
                </br>

                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr style="background-color: grey">
                          <th colspan="3"><font face="Consolas" size="3"><center>
                            Average average (ms) in a day</center></font>
                          </th>
                        </tr>
                        <tr style="background-color: grey">
                          <th><font face="Consolas" size="3"><center>Average to Google</center></font></th>
                          <th><font face="Consolas" size="3"><center>Average to Gateway</center></font></th>
                          <th><font face="Consolas" size="3"><center>Average to Server</center></font></th>
                        </tr>
                          
                      </thead>
                      <tbody>
                    
                        <tr>
                           <td><font face="Courier New" size="3"><center>
                            <?php echo $angka; ?> ms</center></font>
                          </td>
                          <td><font face="Courier New" size="3"><center>
                            <?php echo $angka1; ?> ms</center></font>
                          </td>
                          <td><font face="Courier New" size="3"><center>
                            <?php echo $angka2; ?> ms</center></font>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    </div>            
            </div>                    
        </div>
      </div>
       <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-chart-area"></i>
              <strong>LAST 12 HOURS VOLTAGE CONDITION</strong></center>
          </div>
          <div class="card-body">
        <style type="text/css">
                body {
                  table {margin: 0px auto;}
                </style>
                    <div style="width: 550px;margin: 0px auto;">
                     
                      <canvas id="myChart31"></canvas>
                    </div>
                      <br/>
                      <br/>
                    <?php 
           $times = '';
           $temperature = '';
           $voltage = '';

           $query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 48";
                   $query_run= mysqli_query($connection, $query);
                   while ($row = mysqli_fetch_array($query_run)) {
                   $temp = $row['parameter1'];
                   $volt = $row['parameter2'];
                   $time   = $row['time1'];
                   $times   = $times.'"'.$time.'",';
                   $temperature = $temperature.$temp.',';
                   $voltage = $voltage.$volt.',';
                  }
                  $times   = trim($times, ",");
                  $temperature = trim($temperature, ",");
                  $voltage = trim($voltage, ",");
                  ?>
                              
                               <script>
                                var ctx = document.getElementById("myChart31").getContext('2d');
                                var myChart31 = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                    labels: [
                                    <?php echo $times;?>
                                    ],
                                      datasets: [{
                                      label: "Voltage",
                                      data: [
                                    <?php echo $voltage; ?>
                                  
                                      ],  
                                      backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      xAxes: [{
                                        time: {
                                          unit: 'time'
                                        },
                                        gridLines: {
                                          display: false
                                        },
                                        ticks: {
                                          maxTicksLimit: 100
                                        }
                                      }],
                                      yAxes: [{
                                        ticks: {
                                          min: 0,
                                          max: 40,
                                          maxTicksLimit: 100
                                        },
                                        gridLines: {
                                          color: "rgb(0, 0, 0, .125)",
                                        }
                                      }],
                                    },
                                    legend: {
                                      display: true
                                    }
                                  }
                                });
                              </script>
          </div>
        </div>
      </div>
        <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-chart-area"></i>
              <strong>LAST 12 HOURS TEMPERATURE CONDITION</strong></center>
          </div>
          <div class="card-body">
        <style type="text/css">
                body {
                  table {margin: 0px auto;}
                </style>
                    <div style="width: 550px;margin: 0px auto;">
                      <canvas id="myChart33"></canvas>
                    
                    </div>
                      <br/>
                      <br/>
                    <?php 
           $times = '';
           $temperature = '';
           $voltage = '';

           $query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 48";
                   $query_run= mysqli_query($connection, $query);
                   while ($row = mysqli_fetch_array($query_run)) {
                   $temp = $row['parameter1'];
                   $volt = $row['parameter2'];
                   $time   = $row['time1'];
                   $times   = $times.'"'.$time.'",';
                   $temperature = $temperature.$temp.',';
                   $voltage = $voltage.$volt.',';
                  }
                  $times   = trim($times, ",");
                  $temperature = trim($temperature, ",");
                  $voltage = trim($voltage, ",");
                  ?>
                              <script>
                                var ctx = document.getElementById("myChart33").getContext('2d');
                                var myChart33 = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                    labels: [
                                    <?php echo $times;?>
                                    ],
                                      datasets: [{
                                      label: "Temperature",
                                      data: [
                                    <?php echo $temperature; ?>
                                  
                                      ],  
                                      backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255,99,132,1)',
                            borderWidth: 1
                        }]
                                  },
                                  options: {
                                    scales: {
                                      xAxes: [{
                                        time: {
                                          unit: 'time'
                                        },
                                        gridLines: {
                                          display: false
                                        },
                                        ticks: {
                                          maxTicksLimit: 100
                                        }
                                      }],
                                      yAxes: [{
                                        ticks: {
                                          min: 0,
                                          max: 60,
                                          maxTicksLimit: 100
                                        },
                                        gridLines: {
                                          color: "rgb(0, 0, 0, .125)",
                                        }
                                      }],
                                    },
                                    legend: {
                                      display: true
                                    }
                                  }
                                });
                              </script>
                              
          </div>
        </div>
      </div>

            <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-chart-area"></i>
              <strong>LAST 12 HOURS TOTAL IP DHCP AND IP POOL</strong></center>
          </div>
          <div class="card-body">
        <style type="text/css">
                body {
                  table {margin: 0px auto;}
                </style>
                    <div style="width: 550px;margin: 0px auto;">
                      <canvas id="myChart44"></canvas>
                    </div>
                      <br/>
                      <br/>
                    <?php 
           $times = '';
           $dhcp = '';
           $pool = '';
           $dates = '';
             
           $query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 48";
                      $query_run= mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($query_run)) {
                $dhcpip = $row['parameter5'];
                $pooip = $row['parameter4'];
                $time   = $row['time1'];
                $date = $row['date1'];
                $dates = $dates.'"'.$date.'",';
                 $times   = $times.'"'.$time.'",';
                 $dhcp = $dhcp.$dhcpip.',';
                 $pool = $pool.$pooip.',';
                }
                $dates = trim($dates, ",");
                $times   = trim($times, ",");
                $dhcp = trim($dhcp, ",");
                $pool = trim($pool, ",");
              ?>
                              <script>
                                var ctx = document.getElementById("myChart44").getContext('2d');
                                var myChart44 = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [
                                    <?php echo $times;?>
                                    ],
                                      datasets: [{
                                      label: "IP DHCP",
                                      data: [
                                    <?php echo $dhcp; ?>
                                  
                                      ],  
                                      backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255,99,132,1)',
                            borderWidth: 1
                
                                    },{
                                      label: "IP Pool",
                                      data: [
                                      <?php echo $pool; ?>
                                      ],  
                                      backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      xAxes: [{
                                        time: {
                                          unit: 'time'
                                        },
                                        gridLines: {
                                          display: false
                                        },
                                        ticks: {
                                          maxTicksLimit: 100
                                        }
                                      }],
                                      yAxes: [{
                                        ticks: {
                                          min: 0,
                                          max: 60,
                                          maxTicksLimit: 100
                                        },
                                        gridLines: {
                                          color: "rgb(0, 0, 0, .125)",
                                        }
                                      }],
                                    },
                                    legend: {
                                      display: true
                                    }
                                  }
                                });
                              </script>
                             
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-table"></i>
              <strong>AVERAGE TOTAL IP DHCP AND IP POOL IN A DAY</strong></center>
          </div>
          <div class="card-body">
       <?php

                $dhcp1 = '';
                $pool1 = '';
                         
                $dhcp="SELECT AVG(parameter5) AS dhcp FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 48";
                $dhcp_run=mysqli_query($connection, $dhcp);
                while($row = mysqli_fetch_array($dhcp_run)){
                $a = $row['dhcp'];
                $dhcp1 = $dhcp1.$a.',';
                }
                $dhcp1 = trim($dhcp1, ",");

                $pool="SELECT AVG(parameter4) AS pool FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 48";
                $pool_run=mysqli_query($connection, $pool);
                while($row = mysqli_fetch_array($pool_run)){
                $a = $row['pool'];
                $pool1 = $pool1.$a.',';
                }
                $pool1 = trim($pool1, ",");
                $angka = number_format($dhcp1);
                $angka1 = number_format($pool1);

            
                $dhcpdua = '';
                $pooldua = '';
                $time = '';
                $date = '';

                $query="SELECT * FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 1";
                $results= mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($results)) {

                $dhcp_ = $row['parameter5'];
                $pool_ = $row['parameter4'];
                $time_ = $row['time1'];
                $date_ = $row['date1'];

                $dhcpdua = $dhcpdua.$dhcp_.',';
                $pooldua = $pooldua.$pool_.',';
                $time = $time.$time_.',';
                $date = $date.$date_.',';
                }
               
                $dhcpdua = trim($dhcpdua, ",");
                $pooldua = trim($pooldua, ",");
                $time = trim($time, ",");
                $date = trim($date, ",");
                ?>
              
               </br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr style="background-color: grey">
                          <th colspan="3"><font face="Consolas" size="3"><center>
                            Average Total IP DHCP and IP Pool in a day</center></font>
                          </th>
                        </tr>
                        <tr style="background-color: grey">
                          <th><font face="Consolas" size="3"><center>Total IP DHCP</center></font></th>
                          <th><font face="Consolas" size="3"><center>Total IP Pool</center></font></th>
                        </tr>
                          
                      </thead>
                      <tbody>
                    
                        <tr>
                           <td><font face="Courier New" size="3"><center>
                            <?php echo $angka; ?></center></font>
                          </td>
                          <td><font face="Courier New" size="3"><center>
                            <?php echo $angka1; ?></center></font>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    </div>   


                    <font face="Consolas" size="2">Last Total IP DHCP : <font face="Consolas" size="2">  <?php echo $dhcpdua; ?></font></font></br>
                    <font face="Consolas" size="2">Last Total IP Pool : <font face="Consolas" size="2">  <?php echo $pooldua; ?></font></font></br>
                    <font face="Consolas" size="2">Last Update : </font></br>
                    <font face="Consolas" size="2">- Date : <font face="Consolas" size="2">  <?php echo $date; ?></font></font></br>
                    <font face="Consolas" size="2">- Time : <font face="Consolas" size="2">  <?php echo $time; ?> WITA</font></font></br>


</div>
</div>
</div>



      </div>

      </div>

      </div>
      <?php } } ?>
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
