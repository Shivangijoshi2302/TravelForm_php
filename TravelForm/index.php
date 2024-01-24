<?php


$insert= false;
if(isset($_POST['name'])){


$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);


if (!$con) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}

// Select the database
$db = "uktrip"; // Replace with your actual database name
mysqli_select_db($con, $db);




// echo "Success connecting to db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];

$sql = "INSERT INTO `uktrip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `description`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$description', current_timestamp());";

// echo $sql;

if($con->query($sql) == true){
    // echo "Successfully Inserted";
    $insert = true;
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAVEL FORM</title>
    
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

     
</head>
<body>
    <img class="bg" src="uttarakhand-tourism.jpg" alt="Uttarakhand">
    <div class="container">
        <h3>Welcome to Uttarakhand Tourism </h3>
        <p>Confirm your participation and fill up your details over here!</p>
        

        <form action="index.php" method="post">
        <input type=" text" name="name" id=" name" placeholder="Enter your name">
        <input type="text" name="age" id=" age" placeholder="Enter your age" >
        <input type="text" name="gender" id=" gender" placeholder="Enter your gender" >
        <input type="phone" name="phone" id=" phone" placeholder="Enter your phone no." >
        <input type="email" name="email" id=" email" placeholder="Enter your mail" >
<textarea name="description" id="description" cols="30" rows="10" placeholder="Enter your queries or info here"></textarea>
             <button class="btn">submit</button>     

            </form>
            <?php
        if($insert==true){
        echo "<p1 class= 'submitmsg'> Thanks for submitting your form, Welcome to DEVBHOOMI</p1>";
        }
        ?>
    </div>
    <script src="index.js"></script>
     
</body>
</html>