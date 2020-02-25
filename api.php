<?php
header("Content-Type:application/json");
if (isset($_GET['status']) && $_GET['status']!="") {
 include('db.php');
 $status = $_GET['status'];
 $result = mysqli_query(
 $con,
 "SELECT * FROM `gs_daily_move`");
 if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_array($result)){;
 $duty_date = $row['duty_date'];
 $user_id = $row['user_id'];
 $device_name = $row['device_name'];
 $imei = $row['imei'];
 $reading = $row['reading'];
 $owner = $row['username'];
 response($status, $duty_date, $user_id,$device_name,$imei,$reading,$owner);
}

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
//  $conn = mysqli_connect("localhost","root","mechtech5","allphptricks");
//  $chk = "select * from gs_daily_move where imei='$imei'";
//  $result = mysqli_query($conn,$chk);
//  if(mysqli_num_rows($result)){
//  $query ="update gs_daily_move set reading='$reading', duty_date='$duty_date' where imei='$imei'"; 
//  $result = mysqli_query($conn,$query);
// }else{
// 	$query ="insert into gs_daily_move(duty_date,user_id,device_name,imei,reading,username,status) values ('$duty_date','$user_id','$device_name','$imei','$reading','$owner','$status')"; 
//  $result = mysqli_query($conn,$query);
// }

 $json_response = json_encode($response);
 echo $json_response;
}
?>