<?php
session_start();

// Database connection code
$con = mysqli_connect('localhost', 'root', '', 'datapath');

if (!$con) {
    echo "Connection failed!";
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if (empty($login) || empty($pass)) {
        header("Location: index.php?error=Login and Password are required");
        exit();
    }

    // Sanitize input (optional)
    $login = mysqli_real_escape_string($con, $login);
    $pass = mysqli_real_escape_string($con, $pass);

    // Database query
    $sql = "SELECT * FROM USER_AUTH WHERE LOGIN = '$login' AND PASSWORD = '$pass'";
    $result = mysqli_query($con, $sql);

    // Check result
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Successful login
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        header("Location: datapath.html"); // Redirect to datapath.html
        exit();
    } else {
        // Failed login
        header("Location: index.php?error=Incorrect Login or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

