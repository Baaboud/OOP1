<?php
require_once("../connection.php"); // For connection to database
$query = "select * from category  "; // Query to select all data about category table
$result = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../css/bootstrap.css">
    <title> category</title>
</head>

<body class="bg-light">
    <?php
    require_once("../nav.php")
    ?>

    <div class="container">
        <!-- add category -->
        <div class="row justify-content-center">
            <!--add products-->
            <div class="col-lg-6 col-md-6 ">
                <div class="card mt-5 shadow">
                    <div class="card-title my-0">
                        <h3 class="bg-dark text-white text-center py-3"> add product</h3>
                    </div>
                    <div class="card-body">

                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mb-3 fs-5" placeholder=" product Name " name="pro-name">
                            <input type="text" class="form-control mb-3 fs-5" placeholder=" description " name="pro-des">
                            <select name="category" id="" class="form-select mb-2 fs-5">
                                <?php while ($row = mysqli_fetch_assoc($result)) {
                                    $gataID = $row['id'];
                                    $gataName = $row['name'];
                                    echo "<option value='$gataID'>" . $gataName . "</option>";
                                } ?>
                            </select>

                            <input type="number" class="form-control mb-2 fs-5" placeholder="price" name="price">
                            <input type="file" class="form-control mb-2 fs-5" placeholder=" select image " name="image">


                            <button class="btn btn-dark w-100 fs-4" name="pro">save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>