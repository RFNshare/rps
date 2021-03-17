<?php
require_once "pdo.php";
if (isset($_GET['auto_id']))
{
    $auto_id = $_GET['auto_id'];
    $sql = "DELETE FROM autos WHERE auto_id = $auto_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        $auto_id=> $_GET['auto_id']
    ));
    header("Location: autos.php?name=" . $_POST['asd'] . "&message=Successfully Deleted");
}
?>