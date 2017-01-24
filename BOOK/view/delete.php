<?php include("../include/menu.inc.php");
require("../assets/helper.php");

$id = $_GET["id"];
$book = findBook($id);

$book->deleteFromBDD();

?>
