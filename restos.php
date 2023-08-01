<?php
include("config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodtrips with BBA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header id="main-header" class="bg-warning text-white p-4 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="header-title">FoodTrips
                        <i class="fa fa-cutlery" style="float:right"></i>
                    </h1>
                </div>
            </div>
        </header>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="type"
                            placeholder="Enter Type (Snack/Meal/Dessert)" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="resto" placeholder="Enter Restaurant Name"
                                required>
                        </div>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-secondary float-end" id="addToDo">
                                ADD
                            </button>
                        </div>
                    </div>
                </form>
                <div class="listofRestos mt-5" id="listContainer">
                    <?php
                    
                    $sql = "SELECT resto, type, resto_id FROM restos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $type = $row['type'];
                            $resto = $row['resto'];
                            $restoId = $row['resto_id']; 

                            echo '<div class="row mb-2">';
                            echo '<div class="col-md-4" style="text-align:center;">' . $resto . ' (' . $type . ')</div>';
                            echo '<div class="col-md-4" style="text-align:center;"></div>';
                            echo '<div class="col-md-4" style="text-align:center;"><a href="delete_resto.php?id=' . $restoId . '" class="btn btn-danger">DELETE</a></div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No data available.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>