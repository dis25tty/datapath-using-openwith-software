<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','datapath', null, '/opt/lampp/var/mysql/mysql.sock');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection successful
echo "Connected to MySQL successfully!";


echo "";

$usage = "Usage: create-vlan-br.php <INTERFACE>";

$numArgs = $argc - 1;
if ($numArgs < 1) {
    echo $usage;
    exit;
}

$inf = $argv[1];
$brip = array();
$query = "SELECT Bridgeip FROM VLAN1";
	echo "$query";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
	$brip[] = $row['Bridgeip'];
}
$k = 0;
	echo "$brip[0]";
	echo "$brip[1]";
	echo "$brip[2]";
	echo "$brip[3]";
echo "";

// Fetch VLAN IDs from the database table VLAN1
$query = "SELECT VLAN_ID FROM VLAN1"; // Make sure the column name matches your database table
$result = mysqli_query($con, $query);
	echo "$query";
echo "\n";

// Check if the query was successful and fetch VLAN IDs into $vlanIds array
if ($result) {
    $vlanIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $vlanIds[] = $row['VLAN_ID'];
    }
echo ".....";echo"$vlanIds[0]";
echo ".....";echo"$vlanIds[1]";
echo ".....";echo"$vlanIds[2]";
echo ".....";echo"$vlanIds[3]";
echo ".....";

} else {
    die("Error fetching VLAN IDs from the database: " . mysqli_error($con));
}

$vlanIds = array(3, 4, 5,  6); 

foreach ($vlanIds as $vid) {

//create VLAN interface
    exec("ip link add link $inf name $inf.$vid type vlan id $vid");
    exec("ip link set $inf.$vid up");

    // Create bridge interface
    exec("brctl addbr br$vid");
    exec("brctl addif br$vid $inf.$vid");

    // Set IP address
    exec("ifconfig br$vid {$brip[$k]} netmask 255.255.255.0 up");

    $k++;
    echo $k . PHP_EOL;

    // dd FORWARD rule for the bridge interface
    exec("iptables -A FORWARD -p all -i br$vid -j ACCEPT");

    // Insert information into the database
    $stmt = mysqli_prepare($con, "INSERT INTO VLAN1 (Interface, VLAN_ID, Bridgeip) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sis", $inf, $vid, $brip[$k - 1]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Uncomment the following lines if you want to include additional commands:
// exec("iptables -I FORWARD -p udp -d 255.255.255.255 --sport 68 --dport 67 -j DROP");
// exec("/usr/sbin/dhcrelay -d -4 -i br216 -i br217 -i br218 10.171.9.41 &");

mysqli_close($con);

?>

