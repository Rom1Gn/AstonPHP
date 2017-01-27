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
                <th>Prénom</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php
            $req = $bdd->prepare("SELECT * FROM clients");
            if ($req->execute()) {
                while ($row = $req->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><a href="infos.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm active"
                               role="button" aria-pressed="true">Infos</a>
                            <a href="modifclient.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm active"
                               role="button" aria-pressed="true">Modifier</a></td>
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