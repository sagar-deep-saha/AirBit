<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'airbit');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($con) {
        // echo "Success connecting to the db";

        $ret = $_POST['ret'];
        $lang = $_POST['lang'];
        $desc = $_POST['desc'];
        $sql = "INSERT INTO `airbit`.`yellow` ( `usert`,`lang`,`other`,`dt`) VALUES ( '$ret','$lang','$desc', current_timestamp());";
        // echo $sql;

        if ($con->query($sql) == true) {
            // echo "Successfullly inserted" ;
        } else {
            echo "ERROR: $sql <br> $con->error";
        }




        $con->close();
    }
}
header('location: j_post.php');



?>