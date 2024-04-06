<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'airbit');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    
    if ($con) {
        // echo "Success connecting to the db";
    }

    $blogid = $_POST['blogid'];
    $commenter = $_POST['commenter'];
    $comments = $_POST['comments'];
    $sql = "INSERT INTO `airbit`.`red` ( `blogid`,`commenter`,`comments`, `dt`) VALUES ( '$blogid','$commenter','$comments', current_timestamp());";


    if ($con->query($sql) == true) {
        echo "Submitted Successfullly";
    } else {
        echo "ERROR: $sql <br> $con->error";
    }


    
    $con->close();
}
header('location: index.php');
?>