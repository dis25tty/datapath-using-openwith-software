<?php
// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath', null, '/opt/lampp/var/mysql/mysql.sock');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection successful
echo "Connected to MySQL successfully!" . PHP_EOL . PHP_EOL;

$query = "SELECT VLAN_ID, Interface, Bridgeip FROM VLAN1";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Error fetching VLAN data from the database: " . mysqli_error($con));
}

$vlanData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $vlanData[] = $row;
}

mysqli_close($con);

echo "VLAN data fetched from the database:" . PHP_EOL;
print_r($vlanData);

echo PHP_EOL;

foreach ($vlanData as $vlan) {
    $vid = $vlan['VLAN_ID'];
    $inf = $vlan['Interface'];
    $brip = $vlan['Bridgeip'];

    //create VLAN interface
    exec("ip link add link $inf name $inf.$vid type vlan id $vid");
    exec("ip link set $inf.$vid up");

    // Create bridge interface
    exec("brctl addbr br$vid");
    exec("brctl addif br$vid $inf.$vid");

    // Set IP address
    exec("ifconfig br$vid $brip netmask 255.255.255.0 up");

    // Add FORWARD rule for the bridge interface
    exec("iptables -A FORWARD -p all -i br$vid -j ACCEPT");

    // Insert information into the database
    $con = mysqli_connect('localhost', 'root', '', 'datapath', null, '/opt/lampp/var/mysql/mysql.sock');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($con, "INSERT INTO VLAN1 (Interface, VLAN_ID, Bridgeip) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sis", $inf, $vid, $brip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    mysqli_close($con);

    echo "VLAN $vid configuration completed." . PHP_EOL;
}

echo "Script execution completed." . PHP_EOL;
?>

