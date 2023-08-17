<?php
// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

// Fetch existing VLAN IDs for the dropdown

$fetchAP_NAMEsSql = "SELECT DISTINCT AP_NAME FROM AP";


$resultAP_NAMEs = mysqli_query($con, $fetchAP_NAMEsSql);

// Check if the form was submitted for modifying a VLAN record
    // Get the VLANID and the modified values from the form
    $ACCESS_POINT_NAME = $_POST['ap_name'];// Assuming your dropdown field is named "vlanId"
    $modifiedAPIP = $_POST['modifiedAPIP']; // Assuming your input field is named "modifiedBridgeIP"
    

    // Fetch the existing VLAN record based on $vlanId
    $fetchSql = "SELECT * FROM `AP` WHERE `AP_NAME` = '$ACCES_POINT_NAME'";
    $result = mysqli_query($con, $fetchSql);

    if ($result) {
        // Fetch the VLAN record as an associative array
        $apRecord = mysqli_fetch_assoc($result);

        // Modify the fetched record with the new values
	$apRecord['AP_IP'] = $modifiedAPIP;


        // Escape the modified values to prevent SQL injection
	$modifiedAPIP = mysqli_real_escape_string($con, $modifiedAPIP);
    


        // Database update SQL code
        $updateSql = "UPDATE `AP` SET `AP_IP` = '$modifiedAPIP' WHERE `AP_NAME` = '$ACCESS_POINT_NAME'";

        // Update record in the database
        $rs = mysqli_query($con, $updateSql);

        if ($rs) {
            echo "AP Record Modified";
        } else {
            echo "Error modifying AP record: " . mysqli_error($con);
        }
    } else {
        echo "Error fetching AP record: " . mysqli_error($con);
    }
?>








