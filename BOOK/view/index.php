  <?php include("../include/menu.inc.php");
  require("../include/config.php");
  ?>
  <div class="container">
    <h4>Livres disponibles : </h4>
    <table class="table">
     <thead> <!-- En-tête du tableau -->
         <tr>
             <th>Nom</th>
             <th>Auteur</th>
             <th>Actions</th>
         </tr>
     </thead>

     <tbody> <!-- Corps du tableau -->
  			<?php
  				$db = connect();
  				if($db){
  				  $sql = "SELECT * FROM book";
  				  $result = mysqli_query($db,$sql);
  				  if($result)
  				  {
  					while($row = mysqli_fetch_array($result))
  					{
  						$res = '<tr>';
  						$res .= ('<td>'.$row['name'].'</td>');
  						$res .= ('<td>'.$row['author'].'</td>');
  						$res .= ('<td><a class="btn-primary btn-sm" href="../view/update.php?id='.$row['id'].'">Modifier </a><a class="btn-danger btn-sm" href="../view/delete.php?id='.$row['id'].'">Supprimer</a></td>');
  						$res .= ('</tr>');
  						echo $res;
  					}
  				  }
  				  else
  				  {
  					  echo "Erreur result";
  				  }
  				}
  				else
  				{
  					echo "Erreur db";
  				}

  			?>
     </tbody>
  </table>
</div>
  </body>
</html>
