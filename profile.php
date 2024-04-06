<?php

error_reporting(0);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$rdx = $_SESSION['username'];

if(isset($_SERVER['REQUEST_METHOD'])){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'login');
    
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);


    // $result = mysqli_query($con,"SELECT skills,city FROM users WHERE username='$rdx';");
    $result = mysqli_query($con,"SELECT max(sid),namer,max(skiller),cityer FROM indexer WHERE namer='$rdx';");
    $tesult = mysqli_query($con,"SELECT max(sid),namer,skiller,max(cityer) FROM indexer WHERE namer='$rdx';");

    $con->close();

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbit Profile</title>

    <link rel="shortcut icon" href="f2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="profilef.css" />
    <link rel="stylesheet" href="indexf.css" />


</head>
<body>

    <!-- sidebar starts -->
    <div class="sidebar">


        <div class="sidebarOption , sideOption">
            <span class="material-icons"><img class="k2" src="f2.png" alt=""></span>
            <h4 class="k3"> &nbsp; AirBit</h4>
        </div>


        <div class="sidebarOption  , sideOption">
            <span class="material-icons">home</span>
            <h4 class="k3"> <a href="index.php ">HOME</a> </h4>
        </div>

        <div class="sidebarOption  , sideOption">
            <span class="material-icons">search </span>
            <h4 class="k3"> <a href="search.php">SEARCH</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">explore</span>
            <h4 class="k3"> <a href="explore.php">EXPLORE</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">comment</span>
            <h4 class="k3" > <a href="comment.php">COMMENT</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">person</span>
            <h4 class="k3"> <a href="profile.php">PROFILE</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">boy</span>
            <h4 class="k3"> <a href="xabout.php">ABOUT US</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">logout</span>
            <h4 class="k3"> <a class="nav-link" href="logout.php">Log Out</a> </h4>
        </div>


        <button class="sidebar_tweet ">
            <h4 class="k3"><a href="post.php">NEW POST</a></h4>
        </button>
    </div>
    <!-- sidebar ends -->


    <!--feed starts-->
    <div class="feed">
        <div class="feed_header">
            <img src="f2.png" alt="" class="k2">
            <h2 class="k3">AirBit Profile</h2>
        </div>


        <div class="v1">
        <img class="v2" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffreepngimg.com%2Fthumb%2Fpokemon%2F20250-9-pokeball-photo.png&f=1&nofb=1" alt="user-pokeball" />

            <h3 class="v3">
            <?php echo  $_SESSION['username'] ?>
            </h3>

            
        <div class="sidebarOption  , sideOption , v3">
            <span class="material-icons">edit</span>
            <h4 class="k3"> <a href="edit.php ">edit</a> </h4>
        </div>


        </div>
        <hr>
        <hr>


        <div class="v4">
            <h4 class="v5">USERNAME :  <?php echo  $_SESSION['username'] ?></h4>
            <!-- <p class="v6"><?php echo  $_SESSION['username'] ?></p> -->
            <br>
            <br>

            <?php
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $i=0;
            ?>
                <h4 class="v5">SKILLS :<?php echo $row["max(skiller)"]; ?> </h4>  
                <br>
                <br>
            <?php
            $i++;
            }
            }else{
                echo "No Informations found; ";
                echo "Enter your Informations at Edit.PHP";
            }
            ?>
            <?php
            if (mysqli_num_rows($tesult) > 0) {
            while($row = mysqli_fetch_array($tesult)) {
                $i=0;
            ?>
                <h4 class="v5">ADDRESS :<?php echo $row["max(cityer)"]; ?> </h4>     
                <br>           
                <br>           
            <?php
            $i++;
            }
            }else{
                echo "No Informations found; ";
                echo "Enter your Informations at Edit.PHP";
            }
            ?>

            <!-- hbgcuij -->


        </div>
    </div>
</body>

</html>






<!-- <h4 class="v5">CITY :</h4> -->

                <!-- <p class="v6"><?php echo $row["cityer"]; ?></p> -->