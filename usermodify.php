<?php
// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

// Check if the form was submitted for modifying a VLAN record

    // Get the VLANID and the modified values from the form
$email = $_POST['username']; // Assuming your input field for VLAN_ID is named "VLAN_ID"

    $modifiedPassword = $_POST['modifiedPassword']; // Assuming your input field for bridge IP is named "modifiedBridgeIP"
 $modifiedName = $_POST['modifiedEmail_ID']; 

$fetchSql = "select * from `USER` where `email` = '$email'";
$result = mysqli_query($con, $fetchSql);

if ($result) {
        // Fetch the VLAN record as an associative array
        $userRecord = mysqli_fetch_assoc($result);

        // Modify the fetched record with the new values
	$userRecord['password'] = $modifiedPassword;
$userRecord['firstname'] = $modifiedName;


// Escape the modified values to prevent SQL injection
    $modifiedPassword = mysqli_real_escape_string($con, $modifiedPassword);
     $modifiedName = mysqli_real_escape_string($con, $modifiedName);

    // Database update SQL code
    $updateSql = "UPDATE `USER` SET `PASSWORD` = '$modifiedPassword', `firstname` = '$modifiedName'  WHERE `email` = '$email' ";

    // Update record in the database
    $rs = mysqli_query($con, $updateSql);

    if ($rs) {
        echo "USER Record Modified";
    } else {
        echo "Error modifying USER record: " . mysqli_error($con);
    }
}
?>

