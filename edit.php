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

    $namer = $_POST['namer'];
    $skiller = $_POST['skiller'];
    $cityer = $_POST['cityer'];
    $sql = "INSERT INTO `login`.`indexer` ( `namer`,`skiller`,`cityer`,`dt`) VALUES ( '$namer','$skiller','$cityer', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) == true){
        // echo "Successfullly inserted" ;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Query</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="f2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="indexf.css">
    <style>
        #name{
            width:80%;
            padding:13px;
            border-radius:4px;
            margin:4px;
        }
        #desc{
            width:80%;
            padding:13px;
            border-radius:4px;
            margin:4px;
        }
        #bts{
            text-align:center;
            border-radius:4px;
            font-weight:bold;
            width:80px;
            height:40px;
            background-color:wheat;
        }
        form{
            text-align:center;
        }
        .yt6{
            margin-top: 7px;
        }
    </style>
</head>
<body>


<div style="display:flex;">


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



    <div class="container">

        <form action="edit.php" method="post" default="reset">
            <!-- <input type="text" name="d_name" id="name" placeholder="Enter your name"> -->
            <br>
            <label for="part3id">Username</label>
            <br>
            <input style="display:block;" type="text" id="part3id" name="namer" value="<?php echo  $_SESSION['username'] ?>" >
            <label for="part3id">Skills</label>
            <br>
            <input type="text" id="part3id" name="skiller">
            <label for="part3id">City</label>
            <input type="text" id="part3id" name="cityer">
            <br>
            <br>
            <button class="bet" id="bts" type="submit">Submit</button> 

        </form>
    </div>


</div>
    
</body>
</html>