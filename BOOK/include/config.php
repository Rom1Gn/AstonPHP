<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'crud');

function connect(){
  return mysqli_connect(HOST, USER, PASSWORD, DB); //bool
}

?>
