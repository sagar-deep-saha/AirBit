<?php
error_reporting(0);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}



if(isset($_SERVER['REQUEST_METHOD'])){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'login');
    
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);



if($con){
    // echo "Success connecting to the db";
}

$q = $_POST['q'];
$rev = mysqli_query($con,"SELECT other,usert,lang FROM yellow WHERE lang='$q';");



$ced = $_POST['ced'];
$cef = $_POST['cef'];
$ram = $_POST['ram'];
$sql = "INSERT INTO `login`.`red` ( `nake`,`cef`,`comment`, `dt`) VALUES ( '$ced','$cef','$ram', current_timestamp());";




$con->close();

}
?>





<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Search Bar</title> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <link rel="shortcut icon" href="f2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="searchf.css">
    <link rel="stylesheet" href="indexf.css" />

    <!-- <link rel="stylesheet" href="profile.css"> -->
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







    <div class="containerx" style="display:block;">
        <form action="search.php" method="POST" class="search-barx">
            <input class="s2x" type="text" placeholder="Type to Search" name="q">
            <button class="A" type="submit"><span class="material-icons">search</span></button>
            <!-- <input class="A" type="button" value="Search"> -->
            <!-- <button class="A" type="submit">Search</button> -->
        </form>
    </div>


<div style="display:block;">
            
<div class="post" id="container1"></div>
        <div id="container2">

        <?php
if (mysqli_num_rows($rev) > 0) {
$i=0;
while($row = mysqli_fetch_array($rev)) {
?>

      

        <div class="post_body">
            <div class="post_header">
                <div class="post_headertext">
                    <h3><?php echo $row["usert"]; ?>
                        <span class="post_headerspecial"> <?php echo $row["usert"]; ?>@airbit.mail </span>
                    </h3>
                </div>
            </div>

            <div class="post_headerDescription">
                <div style="background-color:#80c1ff;border-radius:9px;padding:12px">
                <p><?php echo $row["other"]; ?></p>
                </div>
            </div>
        </div>

        <div class="part3">
                    <form action="search.php" method="POST">
                    <input style="display:none" type="text"  name="cef" value="<?php echo  $row['usert'] ?>" placeholder="Add a Comment">
                    <input style="display:none" type="text" id="part3id" name="ced" value="<?php echo  $_SESSION['username'] ?>" placeholder="Add a Comment">
                    <input type="text" id="part3id" name="ram" placeholder="Add a Comment">
                    <!-- <input type="button" value="SEND" id="part3id2"> -->
                    <button type="submit" id="part3id2" >SEND</button>
                </form>
        </div>

        <?php
$i++;
}
}else{
    echo "No result found";
}
?>
</div>






</body>

</html>