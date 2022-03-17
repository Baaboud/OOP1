<?php

require_once("../connection.php");
$gataID = $_GET['GetID'];
$query = " select * from category where id='" . $gataID . "'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $gataID = $row['id']; //
    $gataName = $row['name'];
    $gataDes = $row['description'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../CSS/bootstrap.css" />
    <title>Document</title>
</head>

<body class="bg-light">
    <!-- this form for update category -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5 shadow">
                    <div class="card-title">
                        <h3 class="bg-dark text-white text-center py-3"> Update </h3>
                    </div>
                    <div class="card-body">
                        <form action="update.php?ID=<?php echo $gataID ?>" method="post">
                            <input type="text" class="form-control mb-2" placeholder=" gatagory name " name="cate-name" value="<?php echo $gataName ?>">
                            <input type="text" class="form-control mb-2" placeholder=" description " name="cate-description" value="<?php echo $gataDes ?>">
                            <button class="btn btn-dark w-100" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>