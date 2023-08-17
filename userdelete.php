<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

// get the Id of the record to delete
$recordId = $_POST['recordId'];

// database delete SQL code
$sql = "DELETE FROM `USER` WHERE `USERNAME` = '$recordId'";

// delete record from the database
$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "User Deleted Successfully";
} else {
    echo "Error deleting User record: " . mysqli_error($con);
}
?>
