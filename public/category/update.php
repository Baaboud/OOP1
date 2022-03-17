<?php
    require_once("../connection.php"); 
    if(isset($_POST['update'])) 
    {
        $gataID = $_GET['ID'];
        $gataName = $_POST['cate-name'];
        $gataDes = $_POST['cate-description'];

        $query = " update category set name = '".$gataName."', description='".$gataDes."' where id='".$gataID."'";// this query for update table category
        $result = mysqli_query($con,$query);

        if($result)//check query 
        {
            header("location:index.php");// If ture redirct to view.php
        }
        else
        {
            echo ' Please Check Your Query '; // if false will print error message
        }
    }
    else
    {
        header("location:index.php");
    }
?>