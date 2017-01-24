<?php include("../include/menu.inc.php"); ?>

    <div class="container">
      <form action="../controller/addController.php" method="post">
      <div class="form-group">
        <label for="name">Nom du livre:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" class="form-control" id="author" name="author">
      </div>
      <button type="submit" class="btn btn-default">Ajouter</button>
    </form>
  </div>
