<?php
session_start();
if (isset($_SESSION['admin-logged-in']) && $_SESSION['admin-logged-in']) {
	header("location:/admin");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-with, initial-scale=1.0">
        <title>Login E-Learning Admin</title>

        <link rel="stylesheet" href="assets/css/style-login.css">
    </head>
    <body>
        <div id="container">
            <div id="inner">
                <div id="form-wrapper">
                    <form action="auth.php" method="POST" autocomplete="off">
                        <input type="email" name="email" placeholder="someone@domain.com" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" class="btn green" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>