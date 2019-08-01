<?php
if (!defined('BASEPATH')) 
  exit('No direct script access allowed');

class PRECON_ extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->input->post('submit_form') === 'input_precon') {
      $this->form_validation->set_rules('customer_id','customer_id','trim|required');
      $this->form_validation->set_rules('pop_id','pop_id','trim|required');
      $this->form_validation->set_rules('device_id','device_id','trim|required');
      $this->form_validation->set_rules('ip_gateway','ip_gateway','trim|required');
      $this->form_validation->set_rules('name','name','trim|required');

	  $sub_data = array(
          'form_kosong' => '',
          'hasil_Zyxel' => ''
        );
      if ($this->form_validation->run() == FALSE) {
        $sub_data['form_kosong'] = "<div style='color:red;'>Please Complete This File</div>";
        $this->load->view('template', $sub_data);
      }
      else{

        $hasil_Zyxel = '';
        $customer_id = $this->input->post('customer_id');
        $pop_id = $this->input->post('pop_id');
        $device_id = $this->input->post('device_id');
        $ip_gateway = $this->input->post('ip_gateway');
        $name = $this->input->post('name');
       
		
        $str =
        "
Configuration Mikrotik to Web API
<br>
<br>

/system clock set time-zone-name=Asia/Singapore;<br>
:local systemDate [/system clock get date];<br>
:local systemTime [/system clock get time];<br>
:local ipdhcp [/ip dhcp lease print count];<br>
:local flood [/ tool flood-ping address=8.8.8.8 count=10];<br>
:local jmlhot [/ip hotspot active print count];<br>
:local ippool [/ip pool use print count];<br>
:local router [/system identity get name];<br>
:local Temp [/system health get temperature];<br>
:local Volt2 [/system health get voltage];<br>
:local pcpuL [/system resource get cpu-load];<br>
:local pcpuF [/system resource get cpu-frequency];<br>
:local pmT [/system resource get total-memory];<br>
:local pmF [/system resource get free-memory];<br>
:local uptime [/system resource get uptime];<br>
:local Volt ([:pick \$Volt2 0 2] );<br>
:local Volt3 ([:pick \$Volt2 2 3] );<br>
:local maxRtt2;<br>
:local Received2;<br>
:local flood [/ tool flood-ping address=8.8.8.8 count=10];<br>
:local maxRtt;<br>
:local Received;<br>
:local maxRtt3;<br>
:local Received3;<br>
<br>

/tool flood-ping 8.8.8.8 count=10 do={:if (\$sent = 10) do={:set maxRtt \$\"avg-rtt\"; :set Received \$\"received\";}};<br>
/tool flood-ping $ip_gateway count=10 do={:if (\$sent = 10) do={:set maxRtt2 \$\"avg-rtt\"; :set Received2 \$\"received\";}};<br>
/tool flood-ping 220.247.170.123 count=10 do={:if (\$sent = 10) do={:set maxRtt3 \$\"avg-rtt\"; :set Received3 \$\"received\";}};<br>

<br>
/tool fetch url=\"http://220.247.170.123/MonitoringMikrotik/eventapik.php?customer_id=$customer_id&pop_id=$pop_id&device_id=$device_id&date1=\$systemDate&time1=\$systemTime&amp;parameter1=\$Temp&amp;parameter2=\$Volt.\$Volt3&amp;parameter3=\$jmlhot&amp;parameter4=\$ippool&amp;parameter5=\$ipdhcp&p6receive=\$Received&p7receive=\$Received2&p6avg=\$maxRtt&p6sent=10&p7avg=\$maxRtt2&p7sent=10&p8receive=\$Received3&p8sent=10&p8avg=\$maxRtt3&pcpuL=\$pcpuL&pcpuF=\$pcpuF&pmT=\$pmT&pmF=\$pmF&uptime=\$uptime&submit=\"<br>
<br>
=================================================<br>
<br>

Configuration Mikrotik to Telegram API
<br>
<br>
:local systemDate [/system clock get date];<br>
:local systemTime [/system clock get time];<br>
:local ipdhcp [/ip dhcp lease print count];<br>
:local flood [/tool flood-ping address=8.8.8.8 count=10];<br>
:local jmlhot [/ip hotspot active print count];<br>
:local ippool [/ip pool use print count];<br>
:local router [/system identity get name];<br>
:local Temp [/system health get temperature];<br>
:local Volt2 [/system health get voltage];<br>
:local uptime [/system resource get uptime];<br>
:local cpuL [/system resource get cpu-load];<br>
:local cpuu [/system resource get cpu-frequency];<br>
:local totalM [/system resource get total-memory];<br>
:local freeM [/system resource get free-memory];<br>
:local Volt ([:pick \$Volt2 0 2] );<br>
:local Volt3 ([:pick \$Volt2 2 3] );<br>
:local maxRtt2;<br>
:local Received2;<br>
:local flood [/tool flood-ping address=8.8.8.8 count=10];<br>
:local maxRtt;<br>
:local Received;<br>
:local maxRtt3;<br>
:local Received3;<br>
<br>
/tool flood-ping 8.8.8.8 count=10 do={:if (\$sent = 10) do={:set maxRtt \$\"avg-rtt\"; :set Received \$\"received\";}};<br>
/tool flood-ping $ip_gateway count=10 do={:if (\$sent = 10) do={:set maxRtt2 \$\"avg-rtt\"; :set Received2 \$\"received\";}};<br>
/tool flood-ping 220.247.170.123 count=10 do={:if (\$sent = 10) do={:set maxRtt3 \$\"avg-rtt\"; :set Received3 \$\"received\";}};<br>
<br>
:local kirim \"Customer Name : $name %0A\<br>
Service : Internet%0A\<br>
Router Name : \$router %0A\<br>
DateTime : \$systemDate, \$systemTime WITA%0A\<br>
IP DHCP Used : \$ipdhcp %0A\<br>
IP Pool Used : \$ippool %0A\<br>
Temperature : \$Temp Celcius %0A\<br>
Voltage : \$Volt.\$Volt3 V %0A\<br>
Uptime : \$uptime %0A\<br>
CPU Load : \$cpuL % %0A\<br>
- Ping to Google (8.8.8.8) %0A\<br>
avgRtt : \$maxRtt ms, sent : 10, received : \$Received%0A\<br>
- Ping to Gateway %0A\<br>
avgRtt : \$maxRtt2 ms, sent : 10, received : \$Received2%0A\<br>
- Ping to Server (220.247.170.123) %0A\<br>
avgRtt : \$maxRtt3 ms, sent : 10, received : \$Received3\"; <br>

<br>
/tool fetch url=\"https://api.telegram.org/bot883384624:AAFSpHgrscZRp6v6TmeUDrWpat9jCIToT5U/sendMessage?chat_id=-335967031&text=\$kirim\";

";
        $hasil_Zyxel .= "$str";

        $sub_data = array(
          'form_kosong' => '',
          'hasil_Zyxel' => $hasil_Zyxel
        );
        $this->load->view('template', $sub_data);
      }
    } else{
      $sub_data = array(
        'form_kosong' => '',
        'hasil_Zyxel' => ''
        );
      $this->load->view('template', $sub_data);
    }
  }
}
