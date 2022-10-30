<?php
function navBar($user){
echo 
'<nav class="nav nav-3">
  <a class="nav-logo" href ="index.php"><img src="../imgFiles/logo.png"></img></a>
    <ul class="nav-list">
    <li>
    <a href="./Jeapordy.php">Play</a>
    </li>
    <li>
      <a href="./login.php">Login</a>
    </li>
    <li>
      <a href="./registration.php">Register</a>
    </li>
      <li>
        <a href="./LeaderBoard.php">LeaderBoard</a>
      </li>
    </ul>
    <a>
    <button class="nav-btn">Hello '. $user.' </button>
    </a>
</nav>';
}
function navBarIn($user){
  echo 
  '<nav class="nav nav-3">
    <a class="nav-logo" href ="index.php"><img src="../imgFiles/logo.png"></img></a>
      <ul class="nav-list">
      <li>
      <a href="./Jeapordy.php">Play</a>
      </li>
      <li>
        <button name="">
        <a href="./logout.php">Login</a>
      </li>
      <li>
        <a href="./registration.php">Register</a>
      </li>
        <li>
          <a href="./LeaderBoard.php">LeaderBoard</a>
        </li>
      </ul>
      <a>
      <button class="nav-btn">Hello '. $user.' </button>
      </a>
  </nav>';
  }
