<!-- gre_view.php -->
<!DOCTYPE html>
       <?php
        // database connection code
        $con = mysqli_connect('localhost', 'root', '', 'datapath');

        // Fetch VLAN data from the database
	
	$selectSql = "SELECT * FROM `VLAN1`";
	
        $result = mysqli_query($con, $selectSql);
        
        if ($result) {
	  
		while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>VLAN_ID:".$row['VLAN_ID']."</td><br>";
		echo "<td>INTERFACE:".$row['Interface']."</td><br>";
		echo "<td>BRIDGEIP:".$row['Bridgeip']."</td><br>";
          
		echo "<br></tr><br>";
		
            }
        } else {
            echo "Error fetching VLAN information: " . mysqli_error($con);
        }
        ?>

