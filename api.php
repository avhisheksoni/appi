<?php
header("Content-Type:application/json");
if (isset($_GET['status']) && $_GET['status']!="") {
 include('db.php');
 $status = $_GET['status'];
 $result = mysqli_query(
 $con,
 "SELECT * FROM `gs_daily_move`");
 //$array = array();
 if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_array($result)){;
 $duty_date = $row['duty_date'];
 $user_id = $row['user_id'];
 $device_name = $row['device_name'];
 $imei = $row['imei'];
 $reading = $row['reading'];
 $owner = $row['username'];
 //$array[] = $row;
 // send all table data from here;
 response($status, $duty_date, $user_id,$device_name,$imei,$reading,$owner);
}
// $data = json_encode($array);
// echo $data;

 mysqli_close($con);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
}else{
 response(NULL, NULL, 400,"Invalid Request");
 }
 
function response($status,$duty_date,$user_id,$device_name,$imei,$reading,$owner){
 $response['device_name'] = $status;
 $response['duty_date'] = $duty_date;
 $response['user_id'] = $user_id;
 $response['imei'] = $imei;
 $response['reading'] = $reading;
 $response['device_name'] = $device_name;
 $response['owner'] = $owner;

 $json_response = json_encode($response);
 echo $json_response;
}
?>