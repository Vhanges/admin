<?php
    include ('assets/config/db.php');
    $sql = 'SELECT id, client_name, contact_info, due, style, client_details, client_description FROM contract';
    $result = mysqli_query($con, $sql);
    $con ->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
    <link rel="stylesheet" href="assets\css\dashboard.css">
    <link rel="stylesheet" href="assets\css\materialize.min.css">
    <script defer src="assets\js\materialize.min.js"></script>
    <script defer src="assets\js\dashboard.js"></script>
</head>

<body>
    <div class="main-wrapper">
        <?php
        include "admin-nav.php";
        ?>
        <article class="wrapper-dashboard">
        <div class="dashboard">
                <div class="status-wrapper">
                    <fieldset class="status-box">
                        <legend class="legend">Status</legend>
                             <div class="toggle-button">
                                <input type="checkbox" id="toggle">
                                <label for="toggle" class="slider"></label>
                             </div>
                             <p id="status">Hiatus</p>
                    </fieldset>
                </div>
                <div class="current-client-wrapper">
                    <fieldset class="current-client-box">
                        <legend class="legend">Current Clients</legend> 
                       
                                <?php
                                    include ('assets/config/db.php');

                                    $clientquery = "SELECT * FROM contract";
                                    $totalclient = mysqli_query($con, $clientquery);

                                    if($totalresult = mysqli_num_rows($totalclient))
                                    {
                                        echo "<p id='client-count'>".$totalresult."</p> ";
                                    }
                                    else
                                    {
                                        echo "<p id='client-count'>0</p>";
                                    }
                                    $con -> close();
                                ?>
                    </fieldset>
                </div>
                <div class="contract-wrapper">
                    <fieldset class="contract-box">
                        <legend class="legend">Contract</legend>

                        <table class="centered responsive">
                            
                            <thead>
                                <tr>
                                    <th class=" yellow-text">ID</th>
                                    <th class=" yellow-text">Client Name</th>
                                    <th class=" yellow-text">Contact Info</th>
                                    <th class=" yellow-text">Due</th>
                                    <th class=" yellow-text">Style</th>
                                    <th class=" yellow-text">Details</th>
                                    <th class=" yellow-text">Description</th>
                                    <th class=" yellow-text">Status</th>

                                </tr>
                            </thead>

                            <tbody>
                            <?php
                           include ('assets/config/db.php');
                            if($result ->num_rows > 0)
                            {
                                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                foreach($rows as $row)
                                {
                                    echo    "
                                              <tr>
                                              <td>$row[id]</td>
                                              <td>" . htmlspecialchars($row['client_name']) . "</td>
                                              <td>" . htmlspecialchars($row['contact_info']) . "</td>
                                              <td>" . htmlspecialchars($row['due']) . "</td>
                                              <td>" . htmlspecialchars($row['style']) . "</td>
                                              <td>" . htmlspecialchars($row['client_details']) . "</td>
                                              <td>" . htmlspecialchars($row['client_description']) . "</td>
                                              <td><a class='waves-effect waves-light btn yellow darken-2' href='\Admin\done.php?id= $row[id]'>Done</a></td>
                                             </tr> 
                                           ";
                                }
                            }
                            mysqli_free_result($result);
                            mysqli_close($con);
                            ?>
                          
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
        </article>
</body>
</html>


