<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <style>
	body {
background:  url('https://play-lh.googleusercontent.com/Ei6n4t7xyc4mDmfqsiLweNUpwlNOK0L9mfZqjV-MUNQc3Z03sDKxGI2JAnV1uh4Khns' ) fixed;	
background-repeat:no-repeat;
background-position: center;
}
    </style>
</head>
<body>
    <center>
        <form action="auth.php" method="POST">
            <h1><center><p style="color: black;"><b> OPENWIFI </b></p></center></h1>
            <table>
                <tr>
                    <td><p style="color: black;"><b> LOGIN </b></p></td>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <td><p style="color:black;"><b> PASSWORD </b></p></td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <input type="submit" name="submit" value="SUBMIT"/>
        </form>
    </center>
</body>
</html>

