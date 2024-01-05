<?php

if (isset($_GET['id']) ) {

    $rowId = $_GET['id'];

    include ('assets\config\db.php');

    $sql = "DELETE FROM contract WHERE id = $rowId";

    $con->query($sql);
}

header("location: index.php ");

$con->close();
?>