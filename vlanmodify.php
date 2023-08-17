<?php
// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

// Check if the form was submitted for modifying a VLAN record

    // Get the VLANID and the modified values from the form
$VLAN_ID = $_POST['VLAN_ID']; // Assuming your input field for VLAN_ID is named "VLAN_ID"

    $modifiedBridgeIP = $_POST['modifiedBridgeIP']; // Assuming your input field for bridge IP is named "modifiedBridgeIP"
 
$fetchSql = "select * from `VLAN1` where `VLAN_ID` = '$VLAN_ID'";
$result = mysqli_query($con, $fetchSql);

if ($result) {
        // Fetch the VLAN record as an associative array
        $vlanRecord = mysqli_fetch_assoc($result);

        // Modify the fetched record with the new values
        $vlanRecord['Bridgeip'] = $modifiedBridgeIP;

$VLAN_ID = mysqli_real_escape_string($con, $VLAN_ID);
// Escape the modified values to prevent SQL injection
    $modifiedBridgeIP = mysqli_real_escape_string($con, $modifiedBridgeIP);

    // Database update SQL code
    $updateSql = "UPDATE `VLAN1` SET `Bridgeip` = '$modifiedBridgeIP' WHERE `VLAN_ID` = '$VLAN_ID' ";

    // Update record in the database
    $rs = mysqli_query($con, $updateSql);

    if ($rs) {
        echo "VLAN Record Modified";
    } else {
        echo "Error modifying VLAN record: " . mysqli_error($con);
    }
}
?>

