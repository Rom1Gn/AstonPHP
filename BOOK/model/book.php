<?php
require("../include/config.php");
class Book
{
  private $_id;
  private $_name;
  private $_author;

  function __construct($name, $author)
  {
    $this->_name = $name;
    $this->_author = $author;
  }
  function getName(){return $this->_name;}
  function getAuthor(){ return $this->_author;}
  function getId(){ return $this->_id;}
  function setId($id){ $this->_id = $id;}

  function addInBDD()
  {
			$db = connect();
			if($db)
      {
				$sql = 'INSERT INTO book(name,author) VALUES("'.$this->getName().'",  "'.$this->getAuthor().'")';
				$result = mysqli_query($db,$sql);
				if($result)
				{
          print "Le livre à correctemment été ajouté à la BDD.\n";
          header('Location: ../view/index.php');
        }
      }
  }

  function updateInBDD()
  {
    $db = connect();
    if($db)
    {
      $sql = 'UPDATE book SET name="'.$this->_name.'", author="'.$this->_author.'" WHERE id='.$this->_id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        print "Le livre a été mis à jour. \n";
        header('Location: ../view/index.php');
      }
    }
  }

  function deleteFromBDD()
  {
    $db = connect();
    if($db)
    {
      $sql = 'DELETE FROM book WHERE id='.$this->_id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        print "Le livre a été supprimé en BDD.\n";
        header('Location: ../view/index.php');
      }
    }
  }
}

 ?>
