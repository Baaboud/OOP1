<?php 
  require_once("../connection.php");
  // This  insert for products 
  
 if(isset($_POST['add-category']))
  {
      if(empty($_POST['cate-name']) || empty($_POST['cate-description']))// For make sure that post value is not empty
      {
          echo " Please Fill in the Blanks";
      }
      else
      {
          $cateName = $_POST['cate-name'];
          $cateDes = $_POST['cate-description'];

          $query = " insert into category (name,description) values('$cateName','$cateDes')";//Query for insert values to product table
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
  else
  {
      header("location:index.php"); // if not requst redirct to index.php
  }