<?php
require 'config.php';
$pdoStatement = $conn->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
$pdoStatement->execute();

header("Location: index.php");

?>