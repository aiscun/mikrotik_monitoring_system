    <?php
    session_start();
      include "duaevent.php";

      $c_id = $_GET["customer_id"];
      $p_id = $_GET["pop_id"];
      $d_id = $_GET["device_id"];
      $p1 = $_GET["parameter1"];
      $p2 = $_GET["parameter2"];
      $p3 = $_GET["parameter3"];
      $p4 = $_GET["parameter4"];
      $p5 = $_GET["parameter5"];
      $p6 = $_GET["p6receive"];
      $p7 = $_GET["p7receive"];
      $p61 = $_GET["p6avg"];
      $p62 = $_GET["p6sent"];
      $p71 = $_GET["p7avg"];
      $p72 = $_GET["p7sent"];
      $p8 = $_GET["p8receive"];
      $p81 = $_GET["p8sent"];
      $p82 = $_GET["p8avg"];
      $pcpuL = $_GET["pcpuL"];
      $pcpuF = $_GET["pcpuF"];
      $pmT = $_GET["pmT"];
      $pmF = $_GET["pmF"];
      $uptime = $_GET["uptime"];


  $mysqli  = "INSERT INTO  event (event_id, customer_id, pop_id, device_id, date1, time1, parameter1, parameter2, parameter3, parameter4, parameter5, p6receive, p7receive, p6avg, p6sent, p7avg, p7sent, p8receive, p8sent, p8avg, pcpuL, pcpuF, pmT, pmF, uptime) VALUES ('NULL', (SELECT customer_id FROM customer WHERE customer_id='$c_id'), (SELECT pop_id FROM pop WHERE pop_id='$p_id'), (SELECT device_id FROM device WHERE device_id='$d_id'), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p61', '$p62', '$p71', '$p72', '$p8', '$p81', '$p82', '$pcpuL', '$pcpuF', '$pmT', '$pmF', '$uptime')";


      $result  = mysqli_query($conn, $mysqli);
      if ($result) {
       echo "
  <script>
    alert('data successfully added!');
    document.location.href = 'tables.php';
  </script>";
      } else {
        echo "Input fail";
      }
      mysqli_close($conn);
    ?>