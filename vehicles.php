<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <div class="container">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <?php
        // Makes sure the user is logged in (using $_SESSION["validate"]) then queries all vehicles to display
        // information about them as well as using pictures from the vehicles_dir directory. 
        // Information is displayed using rows of Bootstrap cards.

        include("info.php");
        session_start();
        ?>
        
        <?php
        if (!empty($_SESSION["validate"])) {
            print "<h1>Here are our current offers</h1><br /><br />";
            $select_query = "SELECT * FROM `vehicles`";
            $query_return = mysqli_query($connection, $select_query);
            ?>
            <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            while ($vehicle_row = mysqli_fetch_assoc($query_return)) {
                ?>
                <div class="col">
                    <div class="card">
                        <a href="listing.php?id=<?=$vehicle_row["serial"]?>">
                            <img src="./vehicles_dir/<?=$vehicle_row["serial"]?>.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?=$vehicle_row["year"], " ", $vehicle_row["make"], " ", $vehicle_row["model"]?>
                            </h5>
                            <p class="card-text">
                                Retail Price: $<?=number_format($vehicle_row["retail_price"])?><br />
                                Sale Price: $<?=number_format($vehicle_row["sale_price"])?><br />
                                Mileage: <?=number_format($vehicle_row["miles"])?><br />
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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