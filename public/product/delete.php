<?php
require_once('../connection.php');
if(isset($_GET['DelID']))
        {
            $proId=$_GET['DelID'];
            $query2 = " delete from product where id = '".$proId."'";// this query for delete record from table product
            $result2 = mysqli_query($con,$query2);
            if($result2)
            {
                header("location:index.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
         else
         {
             header("location:view.php");
         }
