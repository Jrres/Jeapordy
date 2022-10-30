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
?>

<div class = "question" id ='enlarge'> 
    LeaderBoard 
</div>
<div class = "score" id="enlarge">
<?php 

$handle = fopen("leaderboard.txt", "r");
$top= array("1","2","3");
$count =0;
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if($count==0)
        $top["1"]=$line;
        else if($count==1)
        $top["2"]=$line;
        else if($count==2)
        $top["3"]=$line;
        else break;
        $count++;
    }

    fclose($handle);
}
foreach($top as $place=>$score){
    if($place!='0')
    echo $place.") ".$score."<br>";
}
?>
</div>


</body>
</html>