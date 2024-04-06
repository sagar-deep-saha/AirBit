<?php
error_reporting(0);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: i_login.php");
}

$rf = $_SESSION['username'];

if (isset($_SERVER['REQUEST_METHOD'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'airbit');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $result = mysqli_query($con, "SELECT id,other,usert FROM yellow WHERE usert='$rf' ORDER BY id DESC");

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

        details {
            color: navy;
        }

        details summary {
            cursor: pointer;
            text-decoration: none;
        }

        details summary:hover {
            cursor: pointer;
            text-decoration: none;
        }

        #finance {
            font-size: 18px;
        }

        details hr {
            width: 250px;
        }
    </style>
</head>

<body>

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

    <div class="feed">
        <div class="feed_header">
            <img src="f2.png" alt="" class="k2">
            <h2 class="k3">AirBit</h2>
        </div>


        <?php
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
        ?>


                <div class="post" id="container1"></div>
                <div id="container2">

                    <br>
                    <p>&nbsp; Blog Id :<?php echo $row["id"]; ?></p>
                    <br>


                    <div class="post_avatar">
                        <img src="user.png" alt="user-pokeball" />
                    </div>

                    <div class="post_body">
                        <div class="post_header">
                            <div class="post_headertext">
                                <h3><?php echo $row["usert"]; ?>
                                    <span class="material-icons post_badge">verified</span>
                                    <span class="post_headerspecial"> <?php echo $row["usert"]; ?>@airbit.mail </span>
                                </h3>
                            </div>
                        </div>

                        <div class="post_headerDescription">
                            <div style="background-color:#80c1ff;border-radius:9px;padding:12px">
                                <p id="finance"><?php echo $row["other"]; ?></p>
                                <br>
                                <hr>
                                <details>
                                    <?php
                                    if (isset($_SERVER['REQUEST_METHOD'])) {
                                        define('MB_SERVER', 'localhost');
                                        define('MB_USERNAME', 'root');
                                        define('MB_PASSWORD', '');
                                        define('MB_NAME', 'airbit');

                                        $cookies = $row["id"];

                                        $conx = mysqli_connect(MB_SERVER, MB_USERNAME, MB_PASSWORD, MB_NAME);

                                        $final = mysqli_query($conx, "SELECT blogid,comments,commenter FROM red WHERE blogid='$cookies' ORDER BY id DESC");

                                        $conx->close();
                                    }
                                    ?>
                                    <summary>Comments :</summary>
                                    <br>
                                    <?php
                                    if (mysqli_num_rows($final) > 0) {
                                        $j = 0;
                                        while ($colum = mysqli_fetch_array($final)) {
                                    ?>

                                            <p><?php echo $colum['comments'] ?></p>
                                            <h4> Comment By: <?php echo $colum['commenter'] ?></h4>
                                            <hr>

                                    <?php
                                            $j++;
                                        }
                                    } else {
                                        echo "No Comments Yet";
                                    } ?>
                                </details>
                            </div>
                        </div>

                        <div class="part3">
                            <form action="j_explore-load.php" method="POST">
                                <input style="display:none" type="text" id="part3id" name="blogid" value="<?php echo $row["id"]; ?>" placeholder="Add a Comment">
                                <input style="display:none" type="text" id="part3id" name="commenter" value="<?php echo  $_SESSION['username'] ?>" placeholder="Add a Comment">
                                <input type="text" id="part3id" name="comments" placeholder="Add a Comment" required="required">
                                <button type="submit" id="part3id2">COMMENT</button>
                            </form>
                        </div>
                    </div>

            <?php
                $i++;
            }
        } else {
            echo "No result found";
        }
            ?>
                </div>

                <hr style="color: black;">
                <br>
                <br>
                <br>

</body>

</html>