<?php

session_start();

$Username = $_POST["Username"];
$Password = $_POST["Password"];
// read file of usernames and passwords

if (isset($_POST['Username']) && isset($_POST['Password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Username = validate($_POST['Username']);
    $Password = validate($_POST['Password']);

    if (empty($Username)) {
        header("Location: registration.php?error=Username is required");
        exit();
    } else if (empty($Password)) {
        header("Location: registration.php?error=Password is required");
        exit();
    } else {
        if (strpos(file_get_contents("user.txt"), $Username) == false) {
            if (trim(file_get_contents("user.txt")) == false) {
                file_put_contents("user.txt",  $Username . " " . $Password, FILE_APPEND);
            } else {
                file_put_contents("user.txt", "\n" . $Username . " " . $Password, FILE_APPEND);
            }
        } else if (strpos(file_get_contents("user.txt"), $Username) !== false) {
            header("Location: registration.php?error=Username is taken");
            exit();
        }

        header("Location: login.php?success=registered");
    }
} else {

    header("Location: registration.php");

    exit();
}
?>