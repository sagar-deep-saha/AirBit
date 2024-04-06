<?php  
    if(isset($_POST['desc'])){
   

        session_start();
        
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("location: login.php");
        }
        
        


    if(!$con){
        echo "Success connecting to the db";
    }

    $desc = $_POST['desc'];
    $sql = "INSERT INTO `login`.`posts`
     (`letter`, `time`)VALUES ('$desc', current_timestamp());";

    // if ($con->query($sql) == true){
    //     echo "Successfullly inserted" ;
    // }
    // else{
    //     echo "ERROR: $sql <br> $con->error";
    // }

    $con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Your Post</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    
font-family: 'Roboto', sans-serif;
}

.container{
    max-width: 80%; 
    padding: 34px; 
    margin: auto;
}

.container h1 {
    text-align: center;
    font-family: 'Sriracha', cursive;
    font-size: 40px;
}

p{
    font-size: 17px;
    text-align: center;
    font-family: 'Sriracha', cursive;
}

input, textarea{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.btn{
    color: white;
    background: green;
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid white;
    border-radius: 7px;
    cursor: pointer;
}

.bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.6;
}
.submitMsg{ 
    color: green;
}
    </style>
</head>
<body>
    <div class="container">

        <!-- // if($insert == true){ -->
        <!-- // echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>"; -->
        <!-- // } -->

        <form action="index.php" method="post">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="$SERVER['HTTP_REFERER']"></script>
    
</body>
</html>