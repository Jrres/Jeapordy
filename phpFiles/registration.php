<?php include "functions.php";

session_start();

if (!isset($_SESSION['user_name'])) {
    navBar("user isn't logged in");
} else {
    navLogOut($_SESSION['user_name']);
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>Register</title>
    <link href="../style.css" rel="stylesheet">
</head>

<body>

    <div class="grandParentContaniner">
        <div class="parentContainer">
            <form action="registration-submit.php" id="loginForm" method="post">
                <h2>Please sign up</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error'];  ?></p>
                <?php }
                ?>
                <label>Username</label>
                <input type="text" id="inputUsername" name="Username" style="margin-bottom:10px" placeholder="Username" required="" autofocus=""><br>
                <label>Password</label>
                <input type="Password" id="inputPassword" name="Password" placeholder="Password" required=""><br>
                <button type="Submit">Sign up</button>
            </form>
        </div>
    </div>

    <!-- <label for="inputEmail" class="sr-only">Email address</label> -->
    <!-- <input type="email" id="inputEmail" class="form-control" style="margin-bottom:10px" placeholder="Email address" required="" autofocus=""> -->
    <!-- <label for="inputPassword" class="sr-only">Password</label> -->
    <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""> -->
    <!-- <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label> -->
    <!-- </div> -->
    <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->

    <!-- Your form code will be here - End -->

    </form>
    </div>
    </div>
</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 19c96165144f16e78fa6aae9a66a1246cc33940c
