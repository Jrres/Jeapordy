<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="./style.css">
  </head>
    <body>
    <?php include "functions.php";

    if(!isset($_SESSION['name'])){
        navBar("user isn't logged in");
    }
    else{
    navBar($_SESSION['name']);
    }

    ?>
    <div class= 'scoreboard'>
    <?php
    
    session_start();

    //assign the q num key and state value with Q props helper function 
    if(!isset($_SESSION["points"])){

        $_SESSION["score"] = 0;

        echo 
        "<div>
        <div class='score'>Choose a card</div>
        </div>";

    }
    else{

        $points = $_SESSION["points"];

        $_SESSION["score"]+=$points;
        
        echo "<div class='score'> Your score: <br>" . $_SESSION["score"] . "</div>";

    }
    if(!isset($_SESSION["Selected"] )){

        $_SESSION["Selected"] = Qprops();

    //create the 5 X 5 board

        GetBoard($_SESSION["Selected"]);

    }
    else{ 

        GetBoard($_SESSION["Selected"]);

    }
    ?>
    </div>
    <div>
    <form action ="score.php" method="post">
        <button name="restart" type="submit"  formaction="score.php" formmethod="$_GET" id="restart">Restart</button>   
    </form>  
        <?php

            echo " protocol <br>";

            if(!isset($_GET["restart"])){

                echo "<div class='restart'>Click restart button to reset the game</div>";

            }
            else{

                session_destroy();

                header("Location: ./score.php");
                
            }

        ?>
    </div>
    </body>
</html>

<?php
    function Qprops(){

        $arrQ = array();

        $arrB = array();

        for($i=1;$i<=25;$i++){
            //when theres a space in the parameter, the url fills it in with a percentage garbage val
            $arrQ[$i]= "question".$i;

            $arrB[$i]=0;

        }
        
        $map = array_combine($arrQ,$arrB);

        return $map;

    }
    function GetBoard($param){

    $i=1;

    $tr=0;

    $j=0;

    $criteria= array("GSU","Tech Companies","Web Concepts","Javascript","Halloween",);

    echo "<div class='flip-card'>
    <table>";

    for($k=0;$k<5;$k++){
        echo 
        "<td> $criteria[$k]</a></td>";
      }

        foreach($param as $question => $state ){

            $q = $question;

            if($j%5==0 && $j!=0)

                echo "</tr>";

            if($tr == $j){

                echo "<tr>";

                $tr+=5;

            }
            if($state!=1)

                echo 
                "<td><a href='./game.php?action=$q' name='back'> question$i </a></td>";
            
            if(isset($_GET["score"])){
                if($state==1){
                    
                    if($_GET["score"]=="gain")
                    
                    echo 
                    "<td>RIGHT</td>";

                    else

                    echo 
                    "<td>WRONG</td>";

                }
            }

            $j++;

            $i++;

        }

    echo "</table></div>";

    }
?>
