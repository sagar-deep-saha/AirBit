<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location: i_login.php");
    exit;
}
require_once "i_config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {

                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        header("location:index.php");
                    }
                }
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="f2.png" type="image/x-icon">

    <title>AirBit</title>
    <style>
        #bot {
            background-color: #04aa6d;
        }

        #bot1 {
            background-color: #04aa6d;
            border-radius: 4px;
        }

        #bot1 a {
            color: aliceblue;
        }

        .container {
            box-shadow: 10px 15px 18px #04aa6d;
            border: #0de7e3 1px solid;
            text-align: center;
            border-radius: 13px;
            padding: 13px;
            width: 400px;
        }

        .d74 {
            text-align: center;
            margin-top: 19px;
        }
    </style>

</head>

<body style="background-image: url('f.jpg');">


    <div class="container mt-4 " style="background-color:  #80eed1;">
        <h3><img style="height:46px" src="f2.png" alt=""> &nbsp;&nbsp;Log In to AirBit</h3>
        <hr>

        <form action="" method="post">
            <div class="form-group mt-4 ">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
            </div>
            <div class="form-group mt-4 ">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary" id="bot">Log In</button>
        </form>



    </div>

    <div class="d74">
        <span class="n64">Not an User ?</span>
        <button id="bot1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="i_register.php">Register</a>
                </li>
            </ul>
        </button>
    </div>
</body>

</html>