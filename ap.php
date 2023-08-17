<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','datapath');


// get the post record
$ACCESS_POINT_NAME = $_POST['ap_name'];
$ACCESS_POINT_IP = $_POST['apip'];
$INTERFACE = $_POST['Interface'];
$TUNNEL_NO = $_POST['tno'];
$VLAN_ID = $_POST['VLAN_ID'];


// database insert SQL code
$sql = "INSERT INTO `AP` (`TUNNEL_NUMBER`, `AP_NAME`, `AP_IP`, `VLAN_ID`,`INTERFACE`) VALUES ('$TUNNEL_NO', '$ACCESS_POINT_NAME', '$ACCESS_POINT_IP',  '$VLAN_ID', '$INTERFACE')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
        echo " AP ADDED SUCCESSFULLY";
}
else {
        echo "Error: ". mysqli_error($con);
}

?>
