<?php
  require("../model/book.php");

  $name = isset($_POST["name"])? $_POST["name"] : "";
  $author = isset($_POST["author"])? $_POST["author"]: "";

  if($name != "" && $author != "")
  {
    $book = new Book($name,$author);
    $book->addInBDD();
  }
  else {
    echo "Merci de remplir tous les champs </br>";
  }


 ?>
