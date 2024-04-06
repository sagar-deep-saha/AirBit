<?php
error_reporting(0);
require_once "i_config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST['username']);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
        $password_err = "Passwords should match";
    }


    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("location: i_login.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }


    if (isset($_SERVER['REQUEST_METHOD'])) {
        $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($con) {
        }

        $skills = $_POST['skills'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pin = $_POST['pin'];
        $sqll = "INSERT INTO `airbit`.`indexer` ( `namer`,`skiller`,`cityer`,`stater`,`piner`, `dt`) VALUES ( '$username','$skills','$city','$state','$pin', current_timestamp());";

        if ($con->query($sqll) == true) {
        } else {
            echo "ERROR: $sqll <br> $con->error";
        }

        $con->close();
    }
    mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="f2.png" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>AirBit</title>
    <style>
        #bot {
            background-color: #04aa6d;
            text-align: center;
            align-self: center;
            float: right;
        }

        #bot1 {
            background-color: #04aa6d;
            border-radius: 4px;
            border: black 1px solid;
            text-align: center;
        }

        .lk18 {
            text-align: center;
            margin-top: 19px;
            margin-bottom: 39px;

        }

        #bot1 a {
            color: aliceblue;
        }

        .container {
            width: 560px;
            border: #04aa6d 1px solid;
            padding: 13px;
            border-radius: 13px;
            box-shadow: 10px 15px 18px #04aa6d;
        }
    </style>
</head>

<body style="background-image: url('j.jpg');">
    <div class="container mt-4 " style="background-color:  #80eed1;">

        <h3><img style="height:46px" src="f2.png" alt=""> &nbsp;&nbsp;Sign Up to AirBit</h3>
        <hr>
        <form action="" method="post">
            <div class="form-group mt-4">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Choose an username">
            </div>

            <div class="form-group mt-4">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Create a Password">
            </div>
            <div class="form-group mt-4">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="inputPassword" placeholder="re-enter the password">
            </div>
            <div class="form-group mt-4">
                <label for="inputAddress2">Skills</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Skills or Programming Languages you know" name="skills">
            </div>
            <div class="form-group mt-4">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="Name your City" placeholder="Enter your City Name" name="city">
            </div>

            <div class="form-group mt-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="state">
                    <option selected>Select</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Meghayala</option>
                    <option>Mizo-Front</option>
                    <option>Mizoram</option>
                    <option>Naga Hills</option>
                    <option>Odissa</option>
                    <option>Sikkim</option>
                    <option>Tripura</option>
                    <option>West Bengal</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="pin">
            </div>
            <button type="submit" class="btn btn-primary" id="bot">Sign Up</button>
            <br>
            <br>
        </form>
    </div>

    <div class="lk18">
        <span style="color:white;">Already an User !</span>
        <button type="submit" class="" id="bot1">
            <a class="nav-link" href="i_login.php">login</a></button>
    </div>
</body>

</html>