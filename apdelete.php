<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

$fetchTunnelNosSql = "SELECT DISTINCT AP_NAME  FROM AP";


$resultTunnelNos = mysqli_query($con, $fetchTunnelNosSql);

// get the Id of the record to delete
$recordId = $_POST['recordId'];

// database delete SQL code
$sql = "DELETE FROM `AP` WHERE `AP_NAME` = '$recordId'";

// delete record from the database
$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "AP Deleted Successfully";
} else {
    echo "Error deleting AP record: " . mysqli_error($con);
}
?>

<?php
            while ($row = mysqli_fetch_assoc($resultTunnelNos)) {
                echo '<option value="' . $row['tno'] . '">' . $row['tno'] . '</option>';
            }
 ?>


