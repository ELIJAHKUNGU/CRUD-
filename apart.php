<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Rental Management System</title>
</head>
<body>
<?php
//get the id
//retrieve the data
//display
//update 
if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    require 'connection.php';
    $sql="select * from apartment where apartment_id = $id";
    $result= mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    extract($row);

}
if (isset($_POST["save"]))
{
    $house_no =$_REQUEST["house_no"];
    $price =$_REQUEST["price"];
    $description =$_REQUEST["description"];
   


    $id =$_REQUEST["id"];
    require 'connection.php';

    $sql ="UPDATE `apartment` SET `house_no`='$house_no',
    `price`='$price',`description`='$description' WHERE apartment_id=$id";
    mysqli_query($con ,$sql) or die (mysqli_error($con));
    header("location:house.php");

}
?>
<div class="container">
    <div class="col-sm-8 mt-5 card p-3" >
    <form action="#" method="POST">
    <h1>Update Apartment</h1>
    <hr>
        
        <div class="form-group">
            <label for="">House NO</label>
            <input type="number"  value="<?="$house_no";?>" name="house_no" class="form-control px-2 mt-1" required>
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" value="<?="$price";?>"  class="form-control px-2 mt-1" required>
        </div>
       
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" value="<?="$description";?>" id="" cols="30" class="form-control px-2 mt-1" rows="5"></textarea>
        </div>
    
        <a href="./house.php">
        <button  class="btn btn-danger">Cancel</button>
        </a>
        <button type="submit" name="save" class="bg-info text-white btn " >Save</button></a>
        
    </form>
    </div>

</div>
<?php
include 'footer.php';
?>