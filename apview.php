<!-- gre_view.php -->
<!DOCTYPE html>

        <?php
        // database connection code
        $con = mysqli_connect('localhost', 'root', '', 'datapath');

        // Fetch VLAN data from the database
        $selectSql = "SELECT * FROM `AP`";
        $result = mysqli_query($con, $selectSql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>INTERFACE:".$row['INTERFACE']."</td><br>";
                echo "<td>ACCESS POINT NAME:".$row['AP_NAME']."</td><br>";
                echo "<td>ACCESS POINT IP:".$row['AP_IP']."</td><br>";
		echo "<td>TUNNEL NUMBER:".$row['TUNNEL_NUMBER']."</td><br>";
		 echo "<td>VLAN-ID:".$row['VLAN_ID']."</td><br>";
                echo "<br></tr><br>";
            }
        } else {
            echo "Error fetching AP information: " . mysqli_error($con);
        }
        ?>
 
