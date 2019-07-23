<html>

<head>
    <title>My first PHP website</title>
</head>
<?php
include("bstp.php");
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location:index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>


<body>
    <div class="jumbotron container">
        <div>
            <h1 class="display-3" align="center">Home</h1>
            <h2 align="center">CRUD</h2>
            <!--Displays user's name-->
            <button type="button" class="btn btn-primary" disabled>
                Seja bem vindo(a) <?php print "$user" ?></button>
            <a href="logout.php" class="btn btn-danger float-right">Click here to logout</a></p>
        </div>
    </div>

    <div class="container">
        <form action="add.php" method="POST">
            <div class="form-group">
                Add more to list: <input type="text" name="details" class="form-control" /><br />
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="yes" name="public[]">
                    <label class="form-check-label" for="exampleCheck1">Public post</label>
                </div>
                <br />
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

    <h2 align="center">My list</h2>
    <!--  
      <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Details</th>
                    <th scope="col">Post Time</th>
                    <th scope="col">Edit Time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Public Post</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /*
                $con = mysqli_connect("localhost", "sqluser", "midas") or die(ysqli_connect_error()); //Connect to server
                mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //connect to database
                $query = mysqli_query($con, "Select * from list"); // SQL Query
                while ($row = mysqli_fetch_array($query)) {
                    print "<tr>";
                    print '<th scope="row" >' . $row['id'] . "</th>";
                    print '<td>' . $row['details'] . "</td>";
                    print '<td>' . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
                    print '<td>' . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
                    print '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a> </td>';
                    print '<td><a href="#" onclick="myFunction(' . $row['id'] . ')">Delete</a> </td>';
                    print '<td>' . $row['public'] . "</td>";
                    print "</tr>";
                }
                */
                ?>
            <tbody>
        </table>
    </div>
            -->


    <div class="container">
        <div>
            <table id="firstTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Details</th>
                        <th scope="col">Post Time</th>
                        <th scope="col">Edit Time</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Public Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, key, index)  in rows" ::key="row.Id">
                        <td>{{row.Id}}</td>
                        <td>{{row.details}}</td>
                        <td>{{row.date_posted}} - {{row.time_posted}}</td>
                        <td>{{row.date_edited}} - {{row.time_edited}}</td>
                        <td><button class="btn btn-success" @click="">Edit</button></td>
                        <td><button id="btn" class="btn btn-danger" @click="myFunction(row.Id)">Delete</button></td>
                        <td>{{row.public}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-danger").hover(function() {
                $(this).css({
                    "background-color": "yellow",
                    "color": "black"
                });
                $(this).mouseleave(function() {
                    $(this).css({
                        "background-color": "red",
                        "color": "white"
                    });
                })
            })
        });
    </script>


    <script>
        function myFunction(id) {
            let data = index
            var r = confirm("Are you sure you want to delete this record?");
            if (r == true) {
                window.location.assign("delete.php?id=" + data);
            }
        }

        var firstTable = new Vue({
            el: '#firstTable',
            data() {
                return {
                    rows: [],

                }
            },
            methods: {
                getAllUsers() {
                    var self = this; // Armazena a instância do Vue em self

                    fetch("http://127.0.0.1:11000/api.php")
                        .then(response => response.json()).then(data => self.rows = data);
                    //.then(console.log(rows));
                    // Faz referência a data.users
                    //})

                },
                myFunction(index) {
                    let id = index
                    var r = confirm("Are you sure you want to delete this record?");
                    if (r == true) {
                        window.location.assign("delete.php?id=" + id);
                    }
                }
            },
            mounted() {
                this.getAllUsers()
            }
        })
    </script>
</body>

</html>