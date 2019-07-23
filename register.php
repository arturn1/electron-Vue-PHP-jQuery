<html>

<head>
    <title>My first PHP Website</title>
</head>

<body>
        <div class="jumbotron container">
            <div class="container">
                <h1 class="display-3" align="center">Cadastro</h1>
                <h2>Insira seus dados</h2>
            </div>
        </div>
        <div class="container">
            <form action="register.php" method="post">
                <div class="form-group">
                    Enter your new Username:
                    <input type="text" name="username" required="required" class="form-control" /> <br />
                    Enter your new password:
                    <input type="password" name="password" required="required" class="form-control" /> <br />
                    <input type="submit" class="btn btn-success" value="Save" />
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
</body>

</html>



<?php

include("bstp.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "sqluser", "midas", "first_db");
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $bool = true;

    //Connect to server

    $query = mysqli_query($con, "SELECT * FROM users"); //Query the users table
    while ($row = mysqli_fetch_array($query)) //display all rows from query
        {
            $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
            if ($username == $table_users) // checks if there are any matching fields
                {
                    $bool = false; // sets bool to false
                    print '<script>alert("Username has been taken!");</script>'; //Prompts the user
                    print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
                }
        }
    if ($bool) // checks if bool is true
        {
            mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
            print '<div class="container alert alert-success">Success</div>'; // Prompts the user
            // print '<script>window.location.assign("index.php");</script>'; // redirects to register.php
        }
    // Check connection
    if (!$con) {
        die("Connection error: " . mysqli_connect_error());
    }
}
?>