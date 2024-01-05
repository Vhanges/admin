<?php
if (isset($_GET['client_id']) ) {

    $rowid = $_GET['client_id'];

    include ('assets\config\db.php');

    $sql = "DELETE FROM commission WHERE client_id = $rowid";

    $con->query($sql);
}

header("location: commission.php ");

$con->close();

?>