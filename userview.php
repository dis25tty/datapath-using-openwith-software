<!-- gre_view.php -->

<?php
        // database connection code
        function userview(){
            $con = mysqli_connect('localhost', 'root', '', 'datapath');

        // Fetch VLAN data from the database

        $selectSql = "SELECT * FROM USER";

        $result = mysqli_query($con, $selectSql);

        if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                echo "<td>USERNAME:".$row['username']."</td><br>";
                echo "<td>PASSWORD:".$row['password']."</td><br>";
                 echo "<td>EMAIL-ID:".$row['email']."</td><br>";
                echo "<br></tr><br>";

            }
        } else {
            echo "Error fetching USER information: " . mysqli_error($con);
        }
    }
    // userview();
    ?>


