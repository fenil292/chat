<?php
	header("location:messanger.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<form method="post">
<table>
    <caption><h1>Login</h1></caption>
    <tr>
        <th>Mobile No:</th>
        <td><input type="text" name="mob"></td>
    </tr>
    <tr>
        <th>Password:</th>
        <td><input type="password" name="pwd"></td>
    </tr>
    <tr>    
        <td colspan="2" style="text-align:center;">
            <input type="submit" name="login" value="Login">
        </td>
    </tr>
</table>
</form>

</body>
</html>
