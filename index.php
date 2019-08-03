<html>

<?php include("bstp.php"); ?>

<head>
    <title>My first PHP Website</title>
</head>

<body>
    <div id="myheader">
        <my-header></my-header>
    </div>

    <div class="jumbotron jumbotron-fluid" id="jumbo" style="display:none">
        <div>
            <h1 class="display-3" align="center">Site do Artur</h1>
            <h3 align="center"> Este é um site que usa PHP, Bootstrap e Vue</h3>
        </div>
    </div>
    <div class="container">
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register.php" class="btn btn-primary float-right">Register</a>
    </div>
</body>
<script type="text/javascript" src="./controller.js"></script>

</html>