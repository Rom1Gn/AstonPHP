<?php include("../include/menu.inc.php");
require("../assets/helper.php");

$id = $_GET["id"];
$book = findBook($id);

?>

    <div class="container">
      <form action="../controller/updateController.php" method="post">
      <div class="form-group">
        <label for="name">Nom du livre:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $book->getName(); ?>">
      </div>
      <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" class="form-control" id="author" name="author" value="<?php echo $book->getAuthor(); ?>">
      </div>
      <input type="hidden" name="idBook" id="idBook" value="<?php echo $book->getId(); ?>">
      <button type="submit" class="btn btn-default">Mettre à jour</button>
    </form>
  </div>
