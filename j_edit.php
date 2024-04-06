<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}



if (isset($_SERVER['REQUEST_METHOD'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'airbit');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($con) {
        // echo "Success connecting to the db";
    }

    $namer = $_POST['namer'];
    $skiller = $_POST['skiller'];
    $cityer = $_POST['cityer'];
    $stater = $_POST['stater'];
    $piner = $_POST['piner'];
    $sql = "INSERT INTO `airbit`.`indexer` ( `namer`,`skiller`,`cityer`,`stater`,`piner`, `dt`) VALUES ( '$namer','$skiller','$cityer','$stater','$piner', current_timestamp());";

    if ($con->query($sql) == true) {
        // echo "Successfullly inserted" ;
    } else {
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

    <style>
        body {
            display: flex;
            height: 100vh;
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 10px;
            background-color: aliceblue;
            --twitter-color: #04aa6d;
            --twitter-background: aliceblue;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border- box;
        }

        .sidebarOption {
            display: flex;
            align-items: center;
            cursor: pointer;
            text-align: center;
            padding: 12px;
        }



        .sidebarOption h2 {
            font-weight: 800;
            font-size: 20px;
            margin-right: 20px;
        }

        .sideOption:hover {
            background-color: var(--twitter-background);
            border-radius: 30px;
            color: var(--twitter-color);
            transition: color 100ms ease-out;

        }

        .sidebarOption.active {
            color: var(--twitter-color);
        }

        .sidebar_tweet {
            width: 100%;
            background-color: var(--twitter-color);
            border: none;
            color: white;
            font-weight: 900;
            font-size: 16px;
            border-radius: 30px;
            height: 50px;
            margin-top: 20px;
            cursor: pointer;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .sidebar {
            border-right: 1px solid var(--twitter-background);
            flex: 0.2;
            min-width: 250px;
            margin-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .feed {
            flex: 0.5;
            border-right: 1px solid var(--twitter-background);
            min-width: fit-content;
            overflow: scroll;
            scrollbar-width: 0px;
        }

        .feed_header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 100;
            border: 1px solid var(--twitter-background);
            padding: 15px 20px;
        }

        .feed_header h2 {
            font-size: 20px;
            font-weight: 800;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .feed::webkit-scrollbar {
            display: none;
        }

        .feed {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .post_avatar img {
            border-radius: 40px;
            height: 46px;
            width: 45px;
        }

        .post {
            display: block;
            align-items: flex-start;
            border-bottom: 1px solid var(--twitter-background);
        }

        .post_body-img {
            width: 450px;
            object-fit: contain;
            border-radius: 20px;
        }

        .post_footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .post_badge {
            font-size: 14px !important;
            color: var(--twitter-color);
            margin-right: 5px;
        }

        .post_headerspecial {
            font-weight: 600;
            font-size: 12px;
            color: gray;
        }

        .post_headertext h3 {
            font-size: 15px;
            margin-bottom: 5px;

        }

        .post_headerDescription {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .post_body {
            flex: 1;
            padding: 10px;
        }

        .post__avatar {
            padding: 220px;
        }

        .material-icons a {
            text-decoration: none;
            color: black;
        }

        .k1 {
            border-radius: 8px;
            height: 466px;
        }

        .k2 {
            height: 20px;
            display: inline-flex;
        }

        .k3 {
            display: inline-flex;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .k3 a {
            display: inline-flex;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-decoration: none;
            color: black;
        }

        .k3 a:hover {
            color: var(--twitter-color);
        }

        #content2 {
            display: block;
        }

        .part3 {
            bottom: 0;
            margin-top: 32px;
            margin-bottom: 0px;
            width: 98%;
            display: inline;
        }

        #part3id {
            width: 98%;
            border-radius: 5px;
            height: 22px;
        }

        #part3id2 {
            border-radius: 5px;
            margin: 1px;
            padding: 1%;
            margin-top: 2px;
            cursor: pointer;
            background-color: var(--twitter-color);
            color: #fff;
            font-weight: bold;
            word-wrap: break-word;
            word-break: break-all;
        }

        .aa1 {
            border: #fff solid 1px;
            border-radius: 7px;
            margin: 16px;
            padding: 4px;


        }

        .aa2 img {
            height: 36px;
            width: 36px;
            display: flex;

        }

        .aa2 {
            display: flex;
            padding: 6px;
            padding-bottom: 0px;
        }

        #newpostba1 {
            background-color: #000;
            width: 300%;
            border-radius: 7px;
            height: 243px;
            padding: 2px;
            color: #fff;
            word-wrap: break-word;
        }

        #newpostba1 input::placeholder {
            text-align: center;
        }

        #newbtnba2 {
            background-color: var(--twitter-color);
            border-radius: 30px;
            font-weight: bolder;
            padding: 1px;
            width: 83px;
            height: 36px;
            font-size: 18px;
            cursor: pointer;
            color: gray;
        }

        #name {
            width: 80%;
            padding: 13px;
            border-radius: 4px;
            margin: 4px;
        }

        #desc {
            width: 80%;
            padding: 13px;
            border-radius: 4px;
            margin: 4px;
        }

        #bts {
            text-align: center;
            border-radius: 4px;
            font-weight: bold;
            width: 80px;
            height: 40px;
            cursor: pointer;
            background-color: wheat;
        }

        form {
            text-align: center;
        }

        .yt6 {
            margin-top: 7px;
        }
    </style>
</head>

<body>


    <div style="display:flex;">

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
                <h4 class="k3"> <a href="j_search.php">SEARCH</a> </h4>
            </div>

            <div class="sidebarOption , sideOption ">
                <span class="material-icons">explore</span>
                <h4 class="k3"> <a href="j_explore.php">EXPLORE</a> </h4>
            </div>

            <div class="sidebarOption , sideOption ">
                <span class="material-icons">comment</span>
                <h4 class="k3"> <a href="j_comment.php">COMMENT</a> </h4>
            </div>

            <div class="sidebarOption , sideOption ">
                <span class="material-icons">person</span>
                <h4 class="k3"> <a href="j_profile.php">PROFILE</a> </h4>
            </div>

            <div class="sidebarOption , sideOption ">
                <span class="material-icons">boy</span>
                <h4 class="k3"> <a href="j_about.php">ABOUT US</a> </h4>
            </div>

            <div class="sidebarOption , sideOption ">
                <span class="material-icons">logout</span>
                <h4 class="k3"> <a class="nav-link" href="i_logout.php">Log Out</a> </h4>
            </div>


            <button class="sidebar_tweet ">
                <h4 class="k3"><a href="j_post.php">NEW POST</a></h4>
            </button>
        </div>

        <div class="container">

            <form action="j_edit.php" method="post" default="reset">
                <br>
                <label for="part3id">Username</label>
                <br>
                <input style="display:block;" type="text" id="part3id" name="namer" value="<?php echo  $_SESSION['username'] ?>">
                <br>
                <label for="part3id">Skills</label>
                <br>
                <input type="text" id="part3id" name="skiller" required="required">
                <br>
                <label for="part3id">City</label>
                <br>
                <input type="text" id="part3id" name="cityer" required="required">
                <br>
                <label for="part3id">State</label>
                <br>
                <input type="text" id="part3id" name="stater" required="required">
                <br>
                <label for="part3id">Pin</label>
                <br>
                <input type="text" id="part3id" name="piner" required="required">
                <br>
                <br>
                <button class="bet" id="bts" type="submit">Submit</button>

            </form>
        </div>
    </div>

</body>

</html>