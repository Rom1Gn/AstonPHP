<?php
require 'includes/head.inc.php';

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
        <h2>Informations de <b><?php echo $surname . " " . $name; ?></b></h2><br/>
        <?php
        if (!empty($_GET['id'])) {
        ?>
        <table>
            <thead>
            <tr>
                <th>Modèle de véhicule</th>
                <th>Type d'assurance</th>
            </tr>
            </thead>
            <?php
            $req = $bdd->prepare("SELECT clients.name, clients.surname, vehicles.model, insurances.type
        FROM clients
        LEFT JOIN vehicles ON clients.id = vehicles.client_id
        LEFT JOIN insurances ON vehicles.id = insurances.vehicle_id
        WHERE clients.id=" . $_GET['id'] . " ");
            if ($req->execute()) {
                while ($data = $req->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $data['model']; ?></td>
                        <td><?php echo $data['type']; ?></td>
                    </tr>
                    <?php
                }
            }
            }
            ?>
        </table>
    </div>
    <div class="spacer" style="clear: both;"></div>
</div>
<footer>
    <p>&copy 2017 - Tous droits réservés.</p>
</footer>
</body>
</html>