<?php 
include('assets/config/db.php');

if (isset($_POST['confirm'])) {
    $client_id = $_POST['client_id'];

    // Your SQL query to insert the selected data into the contract table
    $confirmsql = "INSERT INTO contract (client_name, contact_info, due, style, client_details, client_description)
            SELECT name, email, due_date, art_style, details, description     
            FROM commission
            WHERE client_id = $client_id";

    if ($con->query($confirmsql) === TRUE) {
        header("location: index.php ");
    } else {
        echo "Error: " . $confirmsql . "<br>" . $con->error;
    }
}

// Close the connection
$con->close();
?>