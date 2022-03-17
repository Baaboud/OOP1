<?php 

    require_once("../connection.php");
//update product
    if(isset($_POST['updateProduct']))
    {
        $proID = $_GET['ID'];
        $proName = $_POST['pro-name'];
        $proDes = $_POST['pro-des'];
        $price = $_POST['price'];
        $gata = $_POST['category'];
        $image=$_FILES['image']['name'];

        $file_path="../upload/"; //this path for storge image
        $filePart=explode(".",$image);
        $ex=end($filePart);
        $file_ex=["png","jpg"];
        if(in_array($ex,$file_ex)){
            $newName=time().".".$ex;
            move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);


        $query2="update product set name ='".$proName."', description='".$proDes."', price ='".$price."', img ='".$newName."', category ='".$gata."' where id='".$proID."'"; //this query for update table products
        $result2=mysqli_query($con,$query2);

        if($result2)
        {
            header("location:index.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }

    }
   }
    else
    {
        header("location:index.php");
    }


?>