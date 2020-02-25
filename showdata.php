<?php
if (isset($_POST['status']) && $_POST['status']!="") {
     $status = $_POST['status'];
  // From URL to get webpage contents. 
  $url = "http://localhost/track_s0/vms/api/".$status;

 // Initialize a CURL session. 
  $client = curl_init($url);

  // Return Page contents. 
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);

 //grab URL and pass it to the variable. 
 $response = curl_exec($client);
 $result = json_decode($response);
 
 echo "<table>";
 echo "<tr><td>Order ID:</td><td>$result->status</td></tr>";
 echo "<tr><td>Amount:</td><td>$result->duty_date</td></tr>";
 echo "<tr><td>Response Code:</td><td>$result->user_id</td></tr>";
 echo "<tr><td>Response Desc:</td><td>$result->device_name</td></tr>";
 echo "<tr><td>Rimeic:</td><td>$result->imei</td></tr>";
 echo "<tr><td>odmeter:</td><td>$result->reading</td></tr>";
 echo "</table>";
}
    ?>