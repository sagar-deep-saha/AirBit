<?php
error_reporting(0);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$mx = $_SESSION['username'];

if(isset($_SERVER['REQUEST_METHOD'])){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'login');
    
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);


    $result = mysqli_query($con,"SELECT nake,comment FROM red WHERE nake='$mx';");

$con->close();

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirBit College Community</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <link rel="shortcut icon" href="f2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


        <link rel="stylesheet" href="indexf.css" />
</head>

 















<body>




    <!-- sidebar starts -->
    <div class="sidebar">


        <div class="sidebarOption , sideOption">
            <span class="material-icons"><img class="k2" src="f2.png" alt=""></span>
            <h4 class="k3" > &nbsp; AirBit</h4>
        </div>


        <div class="sidebarOption  , sideOption">
            <span class="material-icons">home</span>
            <h4 class="k3" > <a href="index.php ">HOME</a> </h4>
        </div>

        <div class="sidebarOption  , sideOption">
            <span class="material-icons">search </span>
            <h4 class="k3" > <a href="search.php">SEARCH</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">explore</span>
            <h4 class="k3" > <a href="explore.php">EXPLORE</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">comment</span>
            <h4 class="k3" > <a href="comment.php">COMMENT</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">person</span>
            <h4 class="k3" > <a href="profile.php">PROFILE</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">boy</span>
            <h4 class="k3" > <a href="xabout.php">ABOUT US</a> </h4>
        </div>

        <div class="sidebarOption , sideOption ">
            <span class="material-icons">logout</span>
            <h4 class="k3" > <a class="nav-link" href="logout.php">Log Out</a> </h4>
        </div>


        <button class="sidebar_tweet " ><h4 class="k3" ><a href="post.php">NEW POST</a></h4> </button>
    </div>
    <!-- sidebar ends -->
















    <!--feed starts-->
    <div class="feed">
        <div class="feed_header">
            <img src="f2.png" alt="" class="k2">
            <h2 class="k3" >AirBit</h2>  
        </div>

        <!-- post start-->





<!-- // $deff = " SELECT other FROM yellow WHERE sid=10; " ; -->


<?php
if (mysqli_num_rows($result) > 0) {
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

        
<div class="post" id="container1"></div>
        <div id="container2">
        <div class="post_avatar">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffreepngimg.com%2Fthumb%2Fpokemon%2F20250-9-pokeball-photo.png&f=1&nofb=1" alt="user-pokeball" />
        </div>




        <div class="post_body">
            <div class="post_header">
                <div class="post_headertext">
                    <h3><?php echo $row["nake"]; ?>
                        <span class="material-icons post_badge">verified</span>
                        <span class="post_headerspecial"> <?php echo  $_SESSION['username'] ?>@airbit.mail </span>
                    </h3>
                </div>
            </div>

            <div class="post_headerDescription">
                <div style="background-color:#80c1ff;border-radius:9px;padding:12px">
                <p><?php echo $row["comment"]; ?></p>
                </div>
            </div>
            </div>
            </div>


<?php
$i++;
}
}else{
    echo "No result found";
}
?>

<hr style="color: black;">
<br>
<br>
<br>






    <!--post end-->





    <!--tweet end--->
   
    <!--feeds end-->
<!-- <script src="indexf.js"></script> -->
</body>
</html>