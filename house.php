<?php
include 'header.php';
?>
        <div class="col-sm-9 ">
            <div class="row">
                <div class="col-sm-3 shadow pb-5">
                    <h2>Apartment Data</h2>
                    <?php
                        if(isset($_POST['save'])){
                            require 'connection.php';
                            extract($_POST);
                            $sql = "INSERT INTO `apartment`(`apartment_id`, `house_no`, `category`, `price`, `description`) 
                            VALUES ('null','$house_no','$cat','$price','$desc')";
                              mysqli_query($con,$sql) or  die(mysqli_error($con));
                              header('location:house.php');
                        }

                        ?>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="">House NO</label>
                            <input type="text" name="house_no" class="form-control"required >
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                           <select name="cat" id="" class="form-control"required>
                               <option value="">Select Category</option>
                               <option value="bedister">Bedister</option>
                               <option value="one Bedroom">One Bedroom</option>
                               <option value="Two Bedroom">Two Bedroom</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control"required >
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" id="" cols="30" rows="5" class="form-control " required></textarea>
                        </div>
                        <hr>
                        <div class="d-flex ">
                            <button type="submit" name="save" class="btn btn-info">SAVE</button>
                            <button type="reset" class="ml-4 btn btn-danger">Cancel</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col-sm-9">
                    <table class="table-bordered mt-5"> 
                        <tr>
                            <th>#</th>
                            <th>Room NO</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        //materials  get name and price

                       
                        $qry = "SELECT * FROM apartment";
                        $products =$con->query($qry);
                        while ($row= $products->fetch_assoc())
                        {
                        ?>
                        <tr> 
                            <td><?php echo $row['apartment_id']; ?></td>
                            <td><?php echo $row['house_no']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><a href="./delpay.php?id=<?php echo $row['apartment_id']; ?>"><button class="bg-danger text-white btn "  >Delete</button> </a>
                        <a href="./apart.php?id=<?php echo $row['apartment_id']; ?>"><button class="bg-info text-white btn " >Edit</button></a></td>
                        </tr>
                        <?php } ?>
                       
                    
                    </table>
                </div>
            </div>
        
        </div>
    </div>
    
    <?php
include 'footer.php'
?>