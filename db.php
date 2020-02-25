<?php

$con = mysqli_connect("localhost","root","mechtech5","zadmin_track_s0");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }