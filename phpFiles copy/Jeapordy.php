<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <?php include "card.php";
      //array with question and answer
      $tr = 0;
      $pointsearned = 0;
      
      $val=array();
      //define criterias
      $criteria= array("GSU","Tech Companies","Web Concepts","Javascript","Halloween",);
      //add the value amounts per question to val[]

    echo "<table>";
    for($i=1;$i<=5;$i++){
      $cal = $i*100;
      $val[$i]=strval("$ {$cal}");
    }
    //create the cards with a 5 X 5 matrix
    //create the criteria header
    for($i=0;$i<5;$i++){
      echo crit($criteria[$i]);
    }
   
    //session array for testing if the i can accumulate the totals 
    $_SESSION["questionInfo"]=array(
      array("0"=>array(100,false),"1"=>array(200,false),"2"=>array(300,false),"3"=>array(400,false),"4"=>array(500,false))
    );
    for($i=0;$i<25;$i++){
      if($i%5==0){//i == 5 /tr.
        echo "</tr>";
      }
      if($tr==$i){//tr =0
        echo "<tr>";
        $tr+=5;
      }
      if($i<5){
        echo card($val[1],$i);
        
      }
      else if($i<10){
        echo card($val[2],$i);
      }
      else if($i<15){
        echo card($val[3],$i);
      }
      else if($i<20){
        echo card($val[4],$i);
      }
      else {
        echo card($val[5],$i);
        
      }
    }
    echo "</table>";
    ?>  
    <?php
    session_start(); 

    $USER = null;
    $points =0;
    $points=$_SESSION["points"];
    //$_SESSION[""]=0;
    
    if(isset($_GET["user"])){
      $USER = $_GET["user"];
    }
    if(isset($_GET["value"])){
      $value = $_GET["value"];
    }
 
    $value +=$_SESSION["numval"];
    
    echo "
    <div class='score'> 
      <h1> SCORE: <h1>TEST 
      <h2>
      {$value}
      </h2>
      
    </div>";

    ?>
    
    
  </body>
</html>