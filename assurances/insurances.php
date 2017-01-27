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
        <h2>Liste des clients</h2>
        <table>
            <thead>
            <tr>
                <th>Modèle de véhicule</th>
                <th>Type d'assurance</th>
            </tr>
            </thead>
            <?php
            $req = $bdd->prepare("SELECT vehicles.model, IFNULL(insurances.type,'AUCUNE') AS 'type' FROM vehicles
            LEFT JOIN insurances ON vehicles.id = insurances.vehicle_id");
            if ($req->execute()) {
                while ($row = $req->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                    </tr>
                    <?php
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