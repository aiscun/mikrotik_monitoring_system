<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

  $connection = mysqli_connect("localhost", "root", "", "iconbisa");
  if(isset($_POST['status1'])){
    $customer_id = $_POST['detail_chart1'];

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

<?php
$connect = mysqli_connect("localhost", "root", "", "iconbisa");

$query1 = "SELECT p6receive, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query2 = "SELECT p6avg, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query3 = "SELECT parameter1, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query4 = "SELECT parameter2, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query5 = "SELECT parameter3, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query6 = "SELECT parameter4, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query7 = "SELECT parameter5, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query8 = "SELECT p7receive, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query9 = "SELECT p7avg, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query10 = "SELECT p8receive, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$query11 = "SELECT p8avg, 
UNIX_TIMESTAMP(CONCAT_WS(' ', date1, time1)) AS datetime 
FROM event WHERE customer_id='$customer_id'
ORDER BY date1 DESC, time1 DESC";

$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);
$result5 = mysqli_query($connect, $query5);
$result6 = mysqli_query($connect, $query6);
$result7 = mysqli_query($connect, $query7);
$result8 = mysqli_query($connect, $query8);
$result9 = mysqli_query($connect, $query9);
$result10 = mysqli_query($connect, $query10);
$result11 = mysqli_query($connect, $query11);
$rows = array();
$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$rows5 = array();
$rows6 = array();
$rows7 = array();
$rows8 = array();
$rows9 = array();
$rows10 = array();

$table1 = array();
$table2 = array();
$table3 = array();
$table4 = array();
$table5 = array();
$table6 = array();
$table7 = array();
$table8 = array();
$table9 = array();
$table10 = array();
$table11 = array();


$table1['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Received', 
  'type' => 'number'
 )
);
$table2['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Average', 
  'type' => 'number'
 )
);
$table3['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Temperature', 
  'type' => 'number'
 )
);
$table4['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Voltage', 
  'type' => 'number'
 )
);
$table5['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Total User Hotspot Active', 
  'type' => 'number'
 )
);
$table6['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'IP Pool', 
  'type' => 'number'
 )
);
$table7['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'IP DHCP', 
  'type' => 'number'
 )
);

$table8['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Sent:10; Received', 
  'type' => 'number'
 )
);
$table9['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Average', 
  'type' => 'number'
 )
);
$table10['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Sent:10; Received', 
  'type' => 'number'
 )
);
$table11['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Average', 
  'type' => 'number'
 )
);

while($row = mysqli_fetch_array($result1))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row["p6receive"]
     );
 $rows[] =  array(
     "c" => $sub_array
    );
}
$table1['rows'] = $rows;
$jsonTable = json_encode($table1);

while($row1 = mysqli_fetch_array($result2))
{
 $sub_array = array();
 $datetime = explode(".", $row1["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row1["p6avg"]
     );
 $rows1[] =  array(
     "c" => $sub_array
    );
}
$table2['rows'] = $rows1;
$jsonTable1 = json_encode($table2);

while($row2 = mysqli_fetch_array($result3))
{
 $sub_array = array();
 $datetime = explode(".", $row2["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row2["parameter1"]
     );
 $rows2[] =  array(
     "c" => $sub_array
    );
}
$table3['rows'] = $rows2;
$jsonTable2 = json_encode($table3);

while($row3 = mysqli_fetch_array($result4))
{
 $sub_array = array();
 $datetime = explode(".", $row3["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row3["parameter2"]
     );
 $rows3[] =  array(
     "c" => $sub_array
    );
}
$table4['rows'] = $rows3;
$jsonTable3 = json_encode($table4);

while($row4 = mysqli_fetch_array($result5))
{
 $sub_array = array();
 $datetime = explode(".", $row4["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row4["parameter3"]
     );
 $rows4[] =  array(
     "c" => $sub_array
    );
}
$table5['rows'] = $rows4;
$jsonTable4 = json_encode($table5);

while($row5 = mysqli_fetch_array($result6))
{
 $sub_array = array();
 $datetime = explode(".", $row5["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row5["parameter4"]
     );
 $rows5[] =  array(
     "c" => $sub_array
    );
}
$table6['rows'] = $rows5;
$jsonTable5 = json_encode($table6);

while($row6 = mysqli_fetch_array($result7))
{
 $sub_array = array();
 $datetime = explode(".", $row6["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row6["parameter5"]
     );
 $rows6[] =  array(
     "c" => $sub_array
    );
}
$table7['rows'] = $rows6;
$jsonTable6 = json_encode($table7);

while($row7 = mysqli_fetch_array($result8))
{
 $sub_array = array();
 $datetime = explode(".", $row7["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row7["p7receive"]
     );
 $rows7[] =  array(
     "c" => $sub_array
    );
}
$table8['rows'] = $rows7;
$jsonTable7 = json_encode($table8);

while($row8 = mysqli_fetch_array($result9))
{
 $sub_array = array();
 $datetime = explode(".", $row8["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row8["p7avg"]
     );
 $rows8[] =  array(
     "c" => $sub_array
    );
}
$table9['rows'] = $rows8;
$jsonTable8 = json_encode($table9);

while($row9 = mysqli_fetch_array($result10))
{
 $sub_array = array();
 $datetime = explode(".", $row9["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row9["p8receive"]
     );
 $rows9[] =  array(
     "c" => $sub_array
    );
}
$table10['rows'] = $rows9;
$jsonTable9 = json_encode($table10);

while($row10 = mysqli_fetch_array($result11))
{
 $sub_array = array();
 $datetime = explode(".", $row10["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row10["p8avg"]
     );
 $rows10[] =  array(
     "c" => $sub_array
    );
}
$table11['rows'] = $rows10;
$jsonTable10 = json_encode($table11);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
    var options = {
     title:'Received Ping Data',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart = new google.visualization.AreaChart(document.getElementById('line_chart'));
    chart.draw(data, options);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart1);
   function drawChart1()
   {
    var data1 = new google.visualization.DataTable(<?php echo $jsonTable1; ?>);
    var options1 = {
     title:'Average Ping Data',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart1 = new google.visualization.AreaChart(document.getElementById('line_chart1'));
    chart1.draw(data1, options1);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart2);
   function drawChart2()
   {
    var data2 = new google.visualization.DataTable(<?php echo $jsonTable2; ?>);
    var options2 = {
     title:'Temperature',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart2 = new google.visualization.AreaChart(document.getElementById('line_chart2'));
    chart2.draw(data2, options2);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart3);
   function drawChart3()
   {
    var data3 = new google.visualization.DataTable(<?php echo $jsonTable3; ?>);
    var options3 = {
     title:'Voltage',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart3 = new google.visualization.AreaChart(document.getElementById('line_chart3'));
    chart3.draw(data3, options3);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart4);
   function drawChart4()
   {
    var data4 = new google.visualization.DataTable(<?php echo $jsonTable4; ?>);
    var options4 = {
     title:'Total User Hotspot Active',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart4 = new google.visualization.AreaChart(document.getElementById('line_chart4'));
    chart4.draw(data4, options4);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart5);
   function drawChart5()
   {
    var data5 = new google.visualization.DataTable(<?php echo $jsonTable5; ?>);
    var options5 = {
     title:'Total IP Pool',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart5 = new google.visualization.AreaChart(document.getElementById('line_chart5'));
    chart5.draw(data5, options5);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart6);
   function drawChart6()
   {
    var data6 = new google.visualization.DataTable(<?php echo $jsonTable6; ?>);
    var options6 = {
     title:'Total IP DHCP',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart6 = new google.visualization.AreaChart(document.getElementById('line_chart6'));
    chart6.draw(data6, options6);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart7);
   function drawChart7()
   {
    var data7 = new google.visualization.DataTable(<?php echo $jsonTable7; ?>);
    var options7 = {
     title:'Received',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart7 = new google.visualization.AreaChart(document.getElementById('line_chart7'));
    chart7.draw(data7, options7);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart8);
   function drawChart8()
   {
    var data8 = new google.visualization.DataTable(<?php echo $jsonTable8; ?>);
    var options8 = {
     title:'Average',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart8 = new google.visualization.AreaChart(document.getElementById('line_chart8'));
    chart8.draw(data8, options8);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart9);
   function drawChart9()
   {
    var data9 = new google.visualization.DataTable(<?php echo $jsonTable9; ?>);
    var options9 = {
     title:'Received',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart9 = new google.visualization.AreaChart(document.getElementById('line_chart9'));
    chart9.draw(data9, options9);
   }

   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart10);
   function drawChart10()
   {
    var data10 = new google.visualization.DataTable(<?php echo $jsonTable10; ?>);
    var options10 = {
     title:'Average',
     legend:{position:'bottom'},
     chartArea:{width:'90%', height:'65%'}
    };
    var chart10 = new google.visualization.AreaChart(document.getElementById('line_chart10'));
    chart10.draw(data10, options10);
   }
  </script>
  <style>
  .page-wrapper
  {
   width:1000px;
   margin:0 auto;
  }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Network Monitoring System</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="js/demo/chart-area-demo.js"></script>
  <script type="text/javascript" src="js/Chart.js"></script>
  <link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">ICON+</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <a class="nav-item" href="logout.php" color: black data-toggle="modal" data-target="#logoutModal">
      <i class="menu-icon mdi mdi-logout"></i>
      Logout
    </a>
    </form>
  </nav>

  <div id="wrapper">
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
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
           <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="detailcust.php">Detail Charts</a>
          </li>
          <?php
          $name = '';
          $connection = mysqli_connect("localhost", "root", "", "iconbisa");
          $query="SELECT * FROM customer WHERE customer_id='$customer_id'";
                      $query_run= mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($query_run)) {
                  $names = $row['customer_name'];
                  $name = $name.$names.',';
                }
                $name = trim($name, ",");
           ?>
          <li class="breadcrumb-item active"> Last 365 Days Chart From User <?php echo $name; ?></li>
        </ol>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Received Ping to 8.8.8.8</h2>
                <div id="line_chart" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Average Ping to 8.8.8.8</h2>
                <div id="line_chart1" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Received Ping to Gateway</h2>
                <div id="line_chart7" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Average Ping to Gateway</h2>
                <div id="line_chart8" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Received Ping to Server</h2>
                <div id="line_chart9" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Average Ping to Server</h2>
                <div id="line_chart10" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Temperature Condition</h2>
                <div id="line_chart2" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Voltage Condition</h2>
                <div id="line_chart3" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Total User Hotspot Active</h2>
                <div id="line_chart4" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Total IP Pool</h2>
                <div id="line_chart5" style="width: 100%; height: 500px"></div>
          </div>
          <div class="page-wrapper">
            <br />
              <h2 align="center">Last 365 Days Total IP DHCP</h2>
                <div id="line_chart6" style="width: 100%; height: 500px"></div>
          </div>
      </div>
      
    <?php } } ?>
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <p>Copyright © </p>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
