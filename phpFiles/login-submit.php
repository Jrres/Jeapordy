<?php

session_start();

//read file of usernames and passwords
//
if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login.php?error=User Name is required");

        exit();
    } else if (empty($pass)) {

        header("Location: login.php?error=Password is required");

        exit();
    } else {

        $handle = fopen("user.txt", "r");
        $array = array(
            "user_name" => 0,
            "password" => 1,
            "id" => 2,
        );
        //get the lines user name and password
        if ($handle) {
            while (($line = fgets($handle)) !== false) {

                $record = explode(" ", $line);

                if ($record[$array['user_name']] === $uname && $record[$array['password']] === $pass) {



                    $_SESSION['user_name'] = $record[$array['user_name']];

                    $_SESSION['name'] = $record[$array['password']];

                    $_SESSION['id'] = $record[$array['id']];

                    //need to change the header to jeapordy.php
                    header("Location: Jeapordy.php?user={$_SESSION['user_name']}");

                    exit();
                }
            }


            fclose($handle);
            header("Location: login.php?error=Incorrect User name or password");

            exit();
        } else {

            header("Location: login.php?error=Incorrect User name or password");

            exit();
        }
    }
} else {

    header("Location: login.php");

    exit();
}
