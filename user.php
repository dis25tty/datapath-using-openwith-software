<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','datapath');


// get the post records
$LOGIN = $_POST['login'];
$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];
$EMAIL_ID = $_POST['email_id'];


// database insert SQL code
$sql = "INSERT INTO `USER` (`login`, `username`, `password`, `email_id`) VALUES ('$LOGIN', '$USERNAME', '$PASSWORD', '$EMAIL_ID')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
        echo " USER ADDED SUCCESSFULLY";
}
else {
        echo "Error: ". mysqli_error($con);
}

?>

