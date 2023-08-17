<?php
// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

// Check if the form was submitted for modifying a VLAN record

    // Get the VLANID and the modified values from the form
$USERNAME = $_POST['username']; // Assuming your input field for VLAN_ID is named "VLAN_ID"

    $modifiedPassword = $_POST['modifiedPassword']; // Assuming your input field for bridge IP is named "modifiedBridgeIP"
 $modifiedEmail_ID = $_POST['modifiedEmail_ID']; 

$fetchSql = "select * from `USER` where `USERNAME` = '$USERNAME'";
$result = mysqli_query($con, $fetchSql);

if ($result) {
        // Fetch the VLAN record as an associative array
        $userRecord = mysqli_fetch_assoc($result);

        // Modify the fetched record with the new values
	$userRecord['password'] = $modifiedPassword;
$userRecord['email_id'] = $modifiedEmail_ID;


// Escape the modified values to prevent SQL injection
    $modifiedPassword = mysqli_real_escape_string($con, $modifiedPassword);
     $modifiedEmail_ID = mysqli_real_escape_string($con, $modifiedEmail_ID);

    // Database update SQL code
    $updateSql = "UPDATE `USER` SET `PASSWORD` = '$modifiedPassword', `EMAIL_ID` = '$modifiedEmail_ID'  WHERE `USERNAME` = '$USERNAME' ";

    // Update record in the database
    $rs = mysqli_query($con, $updateSql);

    if ($rs) {
        echo "USER Record Modified";
    } else {
        echo "Error modifying USER record: " . mysqli_error($con);
    }
}
?>

