<?php
require 'includes/head.inc.php';

if (!empty($_POST['send'])) {
    $req = $bdd->prepare("UPDATE clients SET `name`=:name, `surname`=:surname WHERE `id`=:id");
    $req->execute(array(
        "name" => $_POST['name'],
        "surname" => $_POST['surname'],
        "id" => $_POST['id_client']
    ));

    $req2 = $bdd->prepare("UPDATE vehicles SET `model`=:model WHERE `id`=:id");
    $req2->execute(array(
        "model" => $_POST['model'],
        "id" => $_POST['id_vehicle']
    ));

    $req3 = $bdd->prepare("UPDATE insurances SET `type`=:type WHERE `id`=:id");
    $req3->execute(array(
        "type" => $_POST['type'],
        "id" => $_POST['id_insurance']
    ));
}



if (!empty($_GET['id'])) {
    $req = $bdd->prepare("SELECT clients.name, clients.surname FROM clients WHERE clients.id=" . $_GET['id'] . " ");
    if ($req->execute()) {
        while ($data = $req->fetch()) {
            $name = $data['name'];
            $surname = $data['surname'];
        }
    }


}
?>
<div id="content">
    <nav>
        <?php
        include 'includes/nav.inc.php';
        ?>
    </nav>
    <div id="contentDisplay">
        <h2>Modification des informations de <b><?php echo $surname . " " . $name; ?></b></h2><br/>
        <?php
        if (!empty($_GET['id'])) {
        ?>
        <h3>Modifier les assurances / Véhicules</h3>
        <form method="post" action="">
            <table>
                <thead>
                <tr>
                    <th>Modèle de véhicule</th>
                    <th>Type d'assurance</th>
                </tr>
                </thead>
                <?php
                $req = $bdd->prepare("SELECT vehicles.id AS 'idv', vehicles.model, insurances.id AS 'idi', insurances.type
                FROM vehicles
                LEFT JOIN insurances ON vehicles.id = insurances.vehicle_id
                WHERE vehicles.client_id=" . $_GET['id'] . " ");
                if ($req->execute()) {
                    while ($data = $req->fetch()) {
                        ?>
                        <tr>
                            <td>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="model" name="model"
                                           value="<?php echo $data['model']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="type" name="type"
                                           value="<?php echo $data['type']; ?>">
                                    <input type="hidden" name="id_vehicle" value="<?php echo $data['idv']; ?>">
                                    <input type="hidden" name="id_insurance" value="<?php echo $data['idi']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                }
                ?>
            </table>
            <?php
            if (!empty($_GET['id'])) {
                ?>
                <h3 style="margin-top: 50px">Modifier les informations du client</h3>
                <?php
                $req = $bdd->prepare("SELECT * FROM clients WHERE clients.id=" . $_GET['id'] . " ");
                if ($req->execute()) {
                    while ($data = $req->fetch()) {
                        ?>
                        <div class="form-group">
                            <label for="surname">Prénom :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="surname" name="surname"
                                       value="<?php echo $data['surname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name"
                                       value="<?php echo $data['name']; ?>">
                                <input type="hidden" class="form-control" id="id_client" name="id_client"
                                       value="<?php echo $data['id']; ?>">
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <input type="submit" class="btn btn-success" name="send" value="Mettre à jour"
                   style="cursor: pointer;margin-top: 20px">
        </form>
    </div>
    <div class="spacer" style="clear: both;"></div>
</div>
<footer>
    <p>&copy 2017 - Tous droits réservés.</p>
</footer>
</body>
</html>