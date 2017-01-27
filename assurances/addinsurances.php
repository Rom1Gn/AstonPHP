<?php
require 'includes/head.inc.php';

if (!empty($_POST['addInsurance'])) {
    $req = $bdd->prepare("INSERT INTO insurances (vehicle_id,type) VALUES (:vehicle_id,:type)");
    $req->execute(array(
        "vehicle_id" => $_POST['id'],
        "type" => $_POST['name']
    ));
}

global $idVehicle;

?>
<div id="content">
    <nav>
        <?php
        include 'includes/nav.inc.php';
        ?>
    </nav>
    <div id="contentDisplay">
        <h2>Ajout d'une assurance</h2><br/>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Selectionnez un véhicule :</label>
                <div class="col-sm-10">
                    <select class="form-control">
                        <?php
                        $req = $bdd->prepare("SELECT clients.name, clients.surname, vehicles.model, vehicles.id, insurances.type FROM vehicles
                        LEFT JOIN insurances ON vehicles.id = insurances.vehicle_id
                        LEFT JOIN clients ON vehicles.client_id = clients.id
                        WHERE insurances.type IS NULL");
                        if ($req->execute()) {
                            while ($row = $req->fetch()) {
                                $idVehicle = $row['id'];
                                ?>
                                <option name="<?php echo $row['id'] ?>"><?php echo $row['name'] . " " . $row['surname'] . " / " . $row['model'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" name="send" value="Sélectionner" style="cursor: pointer">
        </form>
        <?php
        if (!empty($_POST['send'])) {
            ?>
            <form style="margin-top: 50px" method="post" action="">
                <div class="form-group">
                    <label for="name">Nom de l'assurance :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Entrez le nom de l'assurance">
                        <input type="hidden" name="id" value="<?php echo $idVehicle ?>">
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="addInsurance" value="Ajouter"
                       style="cursor: pointer">
            </form>
            <?php
        }
        ?>
    </div>
    <div class="spacer" style="clear: both;"></div>
</div>
<footer>
    <p>&copy 2017 - Tous droits réservés.</p>
</footer>
</body>
</html>