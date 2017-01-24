<?php
require("../model/book.php");

$id = isset($_POST["idBook"])? $_POST["idBook"] : "";
$name = isset($_POST["name"])? $_POST["name"] : "";
$author = isset($_POST["author"])? $_POST["author"]: "";

if($name != "" && $author != "" && $id != "")
{
  $book = new Book($name,$author);
  $book->setId($id);
  $book->updateInBDD();
}
else {
  echo "Merci de remplir tous les champs </br>";
}


 ?>
