<html>
<head></head>
<body>
<h1>Login</h1><br />
<!-- orbitaluser:password, orbitaladmin:??????? -->
<form method="POST">
    Username: <input type="text" name="user" />
    Password: <input type="password", name="pass" />
    <input type="submit" />
</form>
<br />
<a href="?src=1">Show source</a>
<br />
<?php

if ($_POST['name'] && $_POST['pass']) {
    if ($_POST['name'] == 'orbitaluser' && $_POST['pass'] == 'password') {
        setcookie("user", $_POST['name']);
        setcookie("admin", '0');
        echo "Success!";
    }
}
else {
    if ($_COOKIE["user"]) {
        echo("Username: " . $_COOKIE["user"]);
    }
    if ($_COOKIE["admin"] == "1") {
        echo("You are admin.");
    }
}

if ($_GET['src']) {
    show_source(__FILE__);
}
?>

</body>
</html>
