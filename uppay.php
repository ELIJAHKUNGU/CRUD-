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
    $sql="select * from paymet where paymet_id = $id";
    $result= mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    extract($row);

}
if (isset($_POST["save"]))
{
    $tenant_name =$_REQUEST["tenant_name"];
    $invoice_no =$_REQUEST["invoice_no"];
    $amount =$_REQUEST["amount"];
   


    $id =$_REQUEST["id"];
    require 'connection.php';

    $sql ="UPDATE `paymet` SET `tenant_name`='$tenant_name',`invoice_no`='$invoice_no',
    `amount`='$amount' WHERE  paymet_id=$id";
    mysqli_query($con ,$sql) or die (mysqli_error($con));
    header("location:paymet.php");

}
?>
<div class="container">
    <div class="col-sm-8 mt-5 card p-3" >
    <form action="#" method="POST">
    <h1>Update Paymets</h1>
    <hr>
        
        <div class="form-group">
            <label for="">Tenant Name</label>
            <input type="text"  value="<?="$tenant_name";?>" name="tenant_name" class="form-control px-2 mt-1" required>
        </div>

        <div class="form-group">
            <label for="">Invoive Number</label>
            <input type="text" name="invoice_no" value="<?="$invoice_no";?>"  class="form-control px-2 mt-1" required>
        </div>
       
        <div class="form-group">
            <label for="">Amount</label>
            <input type="number" name="amount" value="<?="$amount";?>" min="0" class="form-control px-2 mt-1" required>
        </div>
    
        <button  class="btn btn-danger">Cancel</button>
        <button type="submit" name="save" class="bg-info text-white btn " >Save</button></a>
        
    </form>
    </div>

</div>
<?php
include 'footer.php';
?>