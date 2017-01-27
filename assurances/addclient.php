<?php
require 'includes/head.inc.php';
?>
    <div id="content">
        <nav>
            <?php
            include 'includes/nav.inc.php';
            ?>
        </nav>
        <div id="contentDisplay">
            <h2>Ajout d'un client</h2><br/>
            <form method="post" action="addclient.php">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Entrez le nom du client">
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname">Prénom :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="surname" name="surname"
                               placeholder="Entrez le prénom du client">
                    </div>
                </div>
                <div class="form-group">
                    <label for="vehicle">Véhicule :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="vehicle" name="vehicle"
                               placeholder="Modèle du véhicule">
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="send" value="Ajouter" style="cursor: pointer">
            </form>
        </div>
        <div class="spacer" style="clear: both;"></div>
    </div>
    <footer>
        <p>&copy 2017 - Tous droits réservés.</p>
    </footer>
    </body>
    </html>

<?php

if (!empty($_POST['send']) && !empty($_POST['name']) && !empty($_POST['surname'])) {
    $req = $bdd->prepare("INSERT INTO clients (name, surname) VALUES (:name, :surname)");
    $req->execute(array(
        "name" => $_POST['name'],
        "surname" => $_POST['surname']
    ));
    $req2 = $bdd->prepare("INSERT INTO vehicles (model, client_id) VALUES (:model, LAST_INSERT_ID($sql))");
    $req2->execute(array(
        "model" => $_POST["vehicle"],
    ));
    header('Location: clients.php');
}

?>