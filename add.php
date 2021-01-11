<?php
    session_start();
    $con = mysqli_connect("localhost", "kde", "midas", "first_db");
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $con = mysqli_connect("localhost", "kde", "midas");
    $details = mysqli_real_escape_string($con,$_POST['details']);
    date_default_timezone_set("America/Sao_Paulo");
    $time = strftime("%X"); //time
    $date = strftime("%B %d, %Y"); //date
    $decision = "no";

       #Print "$time - $date - $details";
   
       
       #mysqli_connect($con,"localhost","kde","midas") or die(mysqli_connect_error()); //Connect to server
       
       mysqli_select_db($con,"first_db") or die("Cannot connect DATABASE"); //Conect to database
       
       #mysqli_query($con,"INSERT INTO list(details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')");
       #or die(mysqli_connect_error()); //SQL query
       mysqli_query($con,"INSERT INTO list(details, date_posted, time_posted, date_edited, time_edited, public) VALUES ('$details', '$date', '$time', '$date', '$time', '$decision')");
       header("location:home.php");
    #}
    } else
    {
       header("location:home.php");
    }
?>
