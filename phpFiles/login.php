<?php include "functions.php";

session_start();

if (!isset($_SESSION['user_name'])) {
    navBar("user isn't logged in");
} else {
    navBar($_SESSION['user_name']);
}

?>
<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>

    <div class="grandParentContaniner">
        <div class="parentContainer">
            <form action="login-submit.php" method="post" id="loginForm">

                <h2>LOGIN</h2>

                <?php if (isset($_GET['error'])) { ?>

                    <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>

                <label>User Name</label>

                <input id="inputUsername" type="text" name="uname" placeholder="User Name"><br>

                <label>Password</label>

                <input id="inputPassword" type="password" name="password" placeholder="Password"><br>

                <button type="submit">Login</button>

            </form>
        </div>
    </div>

</body>

</html>