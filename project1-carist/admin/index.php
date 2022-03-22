<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <?php
    if(isset($_GET["wrong"])){
        echo "Wrong Password";
    }
    ?>
    <form method="post" action="sys/check_login.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <button type="submit">Sign In</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>