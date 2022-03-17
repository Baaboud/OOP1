<?php 
  require_once("../connection.php");
  // This  insert for products 
  
 if(isset($_POST['pro']))
  {
      if(empty($_POST['pro-name']) || empty($_POST['pro-des']) || empty($_POST['price']) || empty($_POST['category']) )// For make sure that post value is not empty
      {
          echo " Please Fill in the Blanks";
      }
      else
      {
          $proName = $_POST['pro-name'];
          $proDes = $_POST['pro-des'];
          $proPrice = $_POST['price'];
          $proGata = $_POST['category'];
          $proImage=$_FILES['image']['name'];

          $file_path="../upload/";  // Path that will storge the image
          $filePart=explode(".",$proImage);
          $ex=end($filePart);
          $file_ex=["png","jpg"]; // extintion of images
          if(in_array($ex,$file_ex)){
              $newName=time().".".$ex; // for change name of image
              move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);

          $query = " insert into product (name,price,description,img,category) values('$proName','$proPrice','$proDes','$newName','$proGata')";//Query for insert values to product table
          $result = mysqli_query($con,$query);
       
          if($result)//check query 
          {
              header("location:index.php");// If true redirct to view.php
          }
          else
          {
              echo '  Please Check Your Query '; // if false message 
          }
      }
    }
  }
  else
  {
      header("location:index.php"); // if not requst redirct to index.php
  }