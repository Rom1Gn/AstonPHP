<?php
require("../model/book.php");

function findBook($id)
{
    $db = connect();
    if($db)
    {
      $sql = 'SELECT id,name,author FROM book WHERE id='.$id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        while ($row = mysqli_fetch_array($result)) {
          $book = new Book($row['name'],$row['author']);
          $book->setId($row['id']);
          return $book;
        }
      }
    }
}


 ?>
