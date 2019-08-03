<html>

<?php
include("bstp.php");
?>

<head>
    <title>My first PHP Website</title>

</head>
<div id="myheader">
    <my-header></my-header>
</div>


<body>
    <div class="jumbotron jumbotron-fluid" id="jumbo" style="display:none">
        <div>
            <h1 class="display-3" align="center">Login</h1>
            <h3 align="center"> Insira seus dados</h3>
        </div>
    </div>
    <div class="container" id="app" style="display:none">
        {{ message }}
    </div>
    <div class="container">
        <form action="checklogin.php" method="POST">
            <div class="form-group">
                Enter Username: <input type="text" name="username" required="required" class="form-control" /> <br />
                Enter password: <input type="password" name="password" required="required" class="form-control" /> <br />
                <button type="submit" class="btn btn-success">LOGIN</button>

                <a href="index.php" class="btn btn-primary">BACK</a>
                <a href="test.php" class="btn btn-info">TEST</a>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="./controller.js"></script>
</body>

</html>