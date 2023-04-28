<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <div class="container">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <?php
        // This page makes sure user is logged in (using $_SESSION["validate"]) then uses the vehicle's serial number from GET to 
        // query the database and display information plus display a picture from the vehicle_dirs directory.
        // Utilizes a card from bootstrap 5 to display.
        // "Vehicle Listed __ Days Ago" info is currently just placed for visual appeal. Functionality could be expanded.

        include("info.php");
        session_start();
        ?>

        <h1>Vehicle Listing</h1>
        <?php
        if (!empty($_SESSION["validate"])) {
            $select_query = "SELECT * FROM `vehicles` WHERE serial='$_GET[id]'";
            $query_return = mysqli_query($connection, $select_query);
            $vehicle = mysqli_fetch_assoc($query_return); //Primary key so no duplicates
            ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./vehicles_dir/<?=$vehicle["serial"]?>.jpg" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?=$vehicle["year"], " ", $vehicle["make"], " ", $vehicle["model"]?>
                            </h5>
                            <p class="card-text">
                                Retail Price: $<?=number_format($vehicle["retail_price"])?><br />
                                Sale Price: $<?=number_format($vehicle["sale_price"])?><br />
                                Mileage: <?=number_format($vehicle["miles"])?><br />
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Vehicle Listed __ Days Ago</small>
                    </div>
                </div>
            </div>
        <?php
        } else {
            ?>
                <h1><br />You must be logged in to view this page.</h1>
            <?php
        }
        ?>
    </body>
  </div>
</html>