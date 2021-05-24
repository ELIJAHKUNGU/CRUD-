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
    $sql="select * from tenant where tenant_id = $id";
    $result= mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    extract($row);

}
if (isset($_POST["save"]))
{
    $name =$_REQUEST["name"];
    $id_no =$_REQUEST["id_no"];
    $primary_phone =$_REQUEST["primary_phone"];
    $secondary_phone =$_REQUEST["secondary_phone"];
    $email_address =$_REQUEST["email_address"];
   
   


    $id =$_REQUEST["id"];
    require 'connection.php';

    $sql ="UPDATE `tenant` SET `name`='$name',`id_no`='$id_no'
    ,`primary_phone`='$primary_phone',`secondary_phone`='$secondary_phone',`email_address`='$email_address' WHERE tenant_id=$id";
    mysqli_query($con ,$sql) or die (mysqli_error($con));
    header("location:tenants.php");
}
if(isset($_POST['cancel'])){
    header("location:tenants.php");

}
?>

<div class="container">
    <div class="col-sm-8 mt-5 card p-3" >
    <form action="#" method="POST">
    <h1>Update Tenants</h1>
    <hr>
        
        <div class="form-group">
            <label for="">Name</label>
            <input type="text"  value="<?="$name";?>" name="name" class="form-control px-2 mt-1" required>
        </div>

        <div class="form-group">
            <label for="">ID NO</label>
            <input type="text" name="id_no" value="<?="$id_no";?>"  class="form-control px-2 mt-1" required>
        </div>
       
        <div class="form-group">
            <label for="">Primary Phone</label>
            <input type="number" name="primary_phone" value="<?="$primary_phone";?>" min="0" class="form-control px-2 mt-1" required>
        </div>
        <div class="form-group">
            <label for="">Secondary Phone</label>
            <input type="number" name="secondary_phone" value="<?="$secondary_phone";?>" min="0" class="form-control px-2 mt-1" required>
        </div>
        <div class="form-group">
            <label for="">Email Address</label>
            <input type="text" name="email_address" value="<?="$email_address";?>" min="0" class="form-control px-2 mt-1" required>
        </div>
    
        <button type="reset" class="btn btn-danger" name="cancel">Cancel</button>
        <button type="submit" name="save" class="bg-info text-white btn " >Save</button></a>
        
    </form>
    </div>

</div>
<?php
include 'footer.php';
?>