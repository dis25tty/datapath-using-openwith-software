<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','datapath');


// get the post records
$INTERFACE = $_POST['Interface'];
$VLAN_ID = $_POST['slider'];
$BRIDGEIP = $_POST['Bridgeip'];



// database insert SQL code
$sql = "INSERT INTO `VLAN1` (`Interface`, `VLAN_ID`, `Bridgeip`) VALUES ('$INTERFACE', '$VLAN_ID', '$BRIDGEIP')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
        echo " VLAN ADDED SUCCESSFULLY";
}
else {
        echo "Error: " . mysqli_error($con);
}
?>

