<?php
$mx = $_SESSION['username'];

if (isset($_SERVER['REQUEST_METHOD'])) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'airbit');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


    $result = mysqli_query($con, "SELECT nake,comment FROM red WHERE nake='$mx';");

    $con->close();

}
header('location:j_comment.php');

?>