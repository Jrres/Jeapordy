<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style.css" rel="stylesheet">

</head>

<body>

  <?php include "functions.php";
  session_start();
  if (!isset($_SESSION['user_name'])) {
    navBar("user isn't logged in");
  } else {
    navBar($_SESSION['user_name']);
  }

  ?>

  <div style="padding-left:16px">
    <img src="../imgFiles/Jeapordy.jpeg"></img>
  </div>

</body>

</html>