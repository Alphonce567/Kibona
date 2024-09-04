
<?php
  $hostname   = "localhost";
  $dbusername   = "root";
  $dbpassword   = "";
  $dbname     = "student";

  $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

  if(!$conn){
    echo "could not connect";
  }
  echo "connectde"
?>
