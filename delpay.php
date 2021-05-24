<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require 'connection.php';
    $sql = "DELETE FROM `apartment` WHERE  apartment_id= $id";
    mysqli_query($con, $sql);
    header('location:index.php');   
}
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require 'connection.php';
    $sql = "DELETE FROM `paymet` WHERE  paymet_id = $id";
    mysqli_query($con, $sql);
    header('location:paymet.php');
   
}
?>
<?php
if(isset($_GET['idt'])){
    $id = $_GET['idt'];
    require 'connection.php';
    $sql = "DELETE FROM `tenant` WHERE   tenant_id = $id";
    mysqli_query($con, $sql);
    header('location:tenants.php');
   
}

?>
