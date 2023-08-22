<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','datapath');


// get the post records
$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];
$EMAIL_ID = $_POST['email'];
$rs=1;
$res=mysqli_query($con,"SELECT * FROM USER");
if($res)
{
        while($row=mysqli_fetch_assoc($res)){
// database insert SQL code
if($row['email']==$EMAIL_ID){
        $rs=0;
        break;
}
}
}

else {
        echo "Error fetching USER information: " . mysqli_error($con);
    }
// insert in database 

if($rs)
{
        
        $sql = "INSERT INTO `USER` ( `username`, `password`,`email`) VALUES ('$USERNAME', '$PASSWORD','$EMAIL_ID')"; 
        $rs = mysqli_query($con, $sql);
        if($rs){

                echo " USER ADDED SUCCESSFULLY";
        }
        else {
          echo "Error: ". mysqli_error($con);
        }
}
else{
        echo "already exist";
}
?>

