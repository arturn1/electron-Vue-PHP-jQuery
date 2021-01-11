<?php

$con = mysqli_connect("localhost", "kde", "midas") or die(ysqli_connect_error()); //Connect to server
mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //connect to database
$query = mysqli_query($con, "Select * from list"); // SQL Query

$i = 0;
while ($row = mysqli_fetch_array($query)) {

    $ret[$i]["Id"] = $row['id'];
    $ret[$i]["details"] = $row['details'];
    $ret[$i]["date_posted"] = $row['date_posted'];
    $ret[$i]["date_edited"] = $row['date_edited'];
    $ret[$i]["public"] = $row['public'];
    $ret[$i]["time_posted"] = $row['time_posted'];
    $ret[$i]["time_edited"] = $row['time_edited'];
    $i++;
}

header("Content-type: application/json");
echo json_encode($ret);
