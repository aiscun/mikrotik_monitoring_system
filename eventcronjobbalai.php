<?php

session_start();
date_default_timezone_set('Asia/Singapore');
include "duaevent.php";

 /**
  * Class defining customer event object. 
  */
class CustomerEvent {
	public $hasEvent;
	public $popID;
	public $deviceID;
	public $dateTime;
 }

 /**
  * Get the Customer Event instance of one most recent Event data linked to the specified customer ID.
  *
  * @param mysqli $mysqli MySQLi connection object.
  * @param string $customer_id The customer ID.
  *
  * @return CustomerEvent An instance of Customer Event.
  * @throws Exception Error on MySQL operation.
  */
function getLastCustomerEvent($mysqli, $customer_id) {
	// Get 1 event data linked to the customer ID
	$query = "SELECT event_id, date1, time1, pop_id, device_id FROM event WHERE customer_id='$customer_id' ORDER BY event_id DESC LIMIT 1";
	$result = mysqli_query($mysqli, $query);
	// If result is more than zero
	$event = new CustomerEvent();
	if (mysqli_num_rows($result) > 0) {
		// Set hasEvent to true, Pop ID, Device ID, and Date Time instance to Customer Event instance
		$row = mysqli_fetch_assoc($result);
//		echo $row['event_id'];
		$event->hasEvent = true;
		$event->popID = $row['pop_id'];
		$event->deviceID = $row['device_id'];
		$event->dateTime = new DateTime($row["date1"] . ' ' . $row["time1"]);
		echo $event->dateTime->format('F d y h:i:s');
		echo ' == ';
	} else {
		// Set hasEvent to false to Customer Event instance
		$event->hasEvent = false;
	}
	return $event;
}

 /**
  * Insert a new Event data linked to the specified customer ID with the value of 0.
  *
  * @param mysqli $mysqli MySQLi connection object.
  * @param string $customer_id The customer ID.
  * @param string $pop_id The pop ID.
  * @param string $device_id The device ID.
  *
  * @return boolean Boolean indicating whether insert operation is success or not.
  */
function insertZeroValue($mysqli, $customer_id, $pop_id, $device_id) {
	// Define insert query
	$p1 = 0;
	$p2 = 0;
	$p3 = 0;
	$p4 = 0;
	$p5 = 0;
	$p6 = 0;
	$p7 = 0;
	$p61 = 0;
	$p62 = 0;
	$p71 = 0;
	$p72 = 0;
	$p8 = 0;
	$p81 = 0;
	$p82 = 0;
	$pcpuL = 0;
	$pcpuF = 0;
	$pmT = 0;
	$pmF = 0;
	$uptime = 0;
	$query = "INSERT INTO  event (customer_id, pop_id, device_id, date1, time1, parameter1, parameter2, parameter3, parameter4, parameter5, p6receive, p7receive, p6avg, p6sent, p7avg, p7sent, p8receive, p8sent, p8avg, pcpuL, pcpuF, pmT, pmF, uptime) VALUES ('$customer_id', '$pop_id','$device_id', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p61', '$p62', '$p71', '$p72', '$p8', '$p81', '$p82', '$pcpuL', '$pcpuF', '$pmT', '$pmF', '$uptime')";
	// Do insert operation
	return mysqli_query($mysqli, $query);

}

function insertZeroValuelog($mysqli, $customer_id) {
	// Define insert query
	$queryzero = "INSERT INTO log (date1, time1, customer_id) VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$customer_id')";
	// Do insert operation
	return mysqli_query($mysqli, $queryzero);

}

// Start by querying customers
// To query specific customer (let's say single customer), define the WHERE clause!
// To query all customers, remove the WHERE clause
$customerSelectResult = mysqli_query($conn, "SELECT customer_id FROM customer WHERE customer_id='CUST_2BPP001'");

// If there are more than zero customer
if (mysqli_num_rows($customerSelectResult) > 0) {
	// Iterate over all customer rows
    while($row = mysqli_fetch_assoc($customerSelectResult)) {
		// Get date time of last inserted Event data
		// linked to this specified customer
		$customerID = $row["customer_id"];
		$event = getLastCustomerEvent($conn, $customerID);
		// If date time is null, that's mean there is no any Event data
		// linked to this specified customer
		if ($event->hasEvent) {
			// Get the minutes difference since the time the Event data
			// is inserted until now
			$popID = $event->popID;
			$deviceID = $event->deviceID;
			$dateTime = $event->dateTime;
			$now = (new DateTime())->setTimezone(new DateTimeZone(date_default_timezone_get()));
            echo $now->format('F d y h:i:s');
			$interval = $dateTime->diff($now);
			$minutes = $interval->days * 24 * 60;
			$minutes += $interval->h * 60;
			$minutes += $interval->i;
            echo ' == ';
			echo $minutes;
			// If the time difference is more than or equal 15 minutes
			if ($minutes >= 15) {
				// Insert a new event data linked to this specified customer
				// with the value of zero
				insertZeroValue($conn, $customerID, $popID, $deviceID);
				insertZeroValuelog($conn, $customerID);
			}
		}
    }
}

mysqli_close($conn);