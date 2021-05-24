<?php 
    session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>


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
    <header>
        <div class="navbar bg-dark">
        <div class="container">
            <nav>
                
                    <div class="row">
                        <h2>Rental Management System </h2>
                        <div class="block">
                        <h2 class="Welcome">Welcome , <?php 
                        echo $user_data['user_name']; ?>!</h2>
                        
                        </div>
                    </div>
            </nav>
        </div>
    </div>
    </header>

    <div class="row">
        <div class="col-sm-3 dashboard">
        <a href="./index.php"><li class="mt-2"><i class="fas fab-home"></i>Dashboard</li></a>
            <a href="./tenants.php"><li class="mt-2"><i class="fa fab-home"></i>Tenants</li></a>
            <a href="./house.php"><li class="mt-2"><i class="fas fab-home"></i>House Details</li></a>
            <a href="./paymet.php"><li class="mt-2"><i class="fas fab-home"></i>Paymet</li></a>
            <a href="./logout.php" class="mt-5 pt-5 ml-5 ">
            <button class="btn btn-info logout text-white">log out</button>
        </a>
         
           
         
        </div>