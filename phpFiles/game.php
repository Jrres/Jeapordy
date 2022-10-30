<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>HTML 5 Boilerplate</title>

    <link rel="stylesheet" href="../style.css">

</head>


<body>

    <?php include "functions.php";

    session_start();
    if (!isset($_SESSION['user_name'])) {
        navBar("user isn't logged in");
    } else {
        navLogOut($_SESSION['user_name']);
    }

    $noneError = "please select an option!";
    $qVal = 0;
    //get the parameter that specifies question number
    if (isset($_GET["action"])) {
        $Props = setInfo($_GET["action"]);

        $choice = array($Props[2], $Props[3], $Props[4], $Props[5]);
        //[0]=>question#,[1]=>question,[2]=>answer,[3]=>choice2,[4]=>choice3,[5]=>choice4 
        getQuestion($Props[1]);

        shuffle($choice);

        echo "<br> <br>";

        $_SESSION["answer"] = $Props[2];

        //check the question number with cases and get the value from the getValue helper function 
        $param = $_GET["action"];

        //sets the state of the card to 1 if its been answered 
        $_SESSION["Selected"] = setState($_SESSION["Selected"], $param);

        $qVal = getValue($param);

        $_SESSION["points"] = $qVal;
        //set the question to false 

    } else {
        if (empty($_POST["choice"])) {
            $param = $_POST["param"];

            header("Location: game.php?action=$param");
        } else {
            $answer = $_POST["answer"];

            if ($_POST["choice"] == $answer) {

                header("Location: jeapordy.php?score=gain");
            }
            if ($_POST["choice"] != $answer) {

                $_SESSION["points"] *= -1;

                header("Location: Jeapordy.php?score=loss");
            }
        }
    }
    ?>
    <div class="question">

        <div class="formcon">
            <form action="game.php?" method="post">


                <li class="qform"><label> <input type="radio" name="choice" value="<?= $choice[0] ?>"><?php echo $choice[0] ?></label></li>


                <li class="qform"><label><input type="radio" name="choice" value="<?= $choice[1] ?>"><?php echo $choice[1] ?></label></li>


                <li class="qform"><label><input type="radio" name="choice" value="<?= $choice[2] ?>"> <?php echo $choice[2] ?></label></li>


                <li class="qform"><label><input type="radio" name="choice" value="<?= $choice[3] ?>"> <?php echo $choice[3] ?></label></li>

                <label><input type="hidden" name="answer" value="<?= $Props[2] ?>"></label>

                <input type="hidden" name="param" value="<?= $param ?>">

                <input type="submit" name="submit">

            </form>

        </div>

    </div>

</body>

</html>

<?php
function getValue($param)
{
    //param is <question#>
    switch ($param) {

        case "question1":
        case "question2":
        case "question3":
        case "question4":
        case "question5":
            $value = 100;
            break;
        case "question6":
        case "question7":
        case "question8":
        case "question9":
        case "question10":
            $value = 200;
            break;
        case "question11":
        case "question12":
        case "question13":
        case "question14":
        case "question15":
            $value = 300;
            break;
        case "question16":
        case "question17":
        case "question18":
        case "question19":
        case "question20":
            $value = 400;
            break;
        case "question21":
        case "question22":
        case "question23":
        case "question24":
        case "question25":
            $value = 500;
            break;
            // wrong question param passed?
        default:
            $value = 0;
            break;
    }
    return $value;
}
function setState($arr, $param)
{

    foreach ($arr as $key => $state) {

        if ($param == $key) {

            $arr[$key] = 1;

            break;
        }
    }

    return $arr;
}
function setInfo($param)
{

    $question = fopen("questions.txt", "r");

    if ($question) {

        while (($line = fgets($question)) !== false) {

            if (strpos($line, "/") !== false) {

                $rows = explode("/", $line);

                if ($rows[0] == $param) {

                    fclose($question);

                    return $rows;
                    //$value= $rows[3];
                    //$_SESSION["value"]=$value;
                    //store correct answer into answers 
                }
            } else {

                continue;
            }
        }
    }
}
function getQuestion($q)
{

    echo "<h2 class='question'> $q </h2>";
}

?>