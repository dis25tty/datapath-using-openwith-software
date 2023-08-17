

<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');


   
$fetchVlanIdsSql = "SELECT DISTINCT VLAN_ID FROM VLAN1";
        
$resultVlanIds = mysqli_query($con, $fetchVlanIdsSql);

// get the Id of the record to delete
$recordId = $_POST['recordId'];

// database delete SQL code
$sql = "DELETE FROM `VLAN1` WHERE `VLAN_ID` = '$recordId'";

// delete record from the database
$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "VLAN Deleted Successfully";
} else {
    echo "Error deleting VLAN record: " . mysqli_error($con);
}
?>

  
