<!-- gre_view.php -->
<!DOCTYPE html>
       <?php
        // database connection code
        $con = mysqli_connect('localhost', 'root', '', 'datapath');

        // Fetch VLAN data from the database

        $selectSql = "SELECT * FROM `USER`";

        $result = mysqli_query($con, $selectSql);

        if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>LOGIN:".$row['LOGIN']."</td><br>";
                echo "<td>USERNAME:".$row['USERNAME']."</td><br>";
                echo "<td>PASSWORD:".$row['PASSWORD']."</td><br>";
                 echo "<td>EMAIL-ID:".$row['EMAIL_ID']."</td><br>";
                echo "<br></tr><br>";

            }
        } else {
            echo "Error fetching USER information: " . mysqli_error($con);
        }
        ?>


