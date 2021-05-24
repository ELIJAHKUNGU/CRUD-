<?php
include './header.php'
?>
        <div class="col-sm-9 ">
            <div class="ml-auto mt-3">
                <button class="btn btn-info badd" data-toggle="modal" data-target="#mypay">Add Tenant</button>
            </div>
            <table class="table-bordered mt-5 tenant"> 
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>ID NO</th>
                    <th>Primary Phone NO</th>
                    <th>Secondary Phone NO</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>
                <?php
                        // get data
                        $qry = "SELECT * FROM tenant";
                        $products =$con->query($qry);
                        while ($row= $products->fetch_assoc())
                        {
                        ?>
                <tr>
                    <td><?php echo $row['tenant_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['id_no']; ?></td>
                    <td><?php echo $row['primary_phone']; ?></td>
                    <td><?php echo $row['secondary_phone']; ?></td>
                    <td><?php echo $row['email_address']; ?></td>
                    <td><a href="./delpay.php?idt=<?php echo $row['tenant_id']; ?>"><button class="bg-danger text-white btn " >Delete</button> </a>
                        <a href="./tenantup.php?id=<?php echo $row['tenant_id']; ?>"><button class="bg-info text-white btn" >Edit</button></a></td>
                </tr>
                <?php } ?>
              
            </table>
        
        </div>
    </div>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="mypay" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tenant Details</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
    
                    <div class="modal-body">
                        <?php
                        if(isset($_POST['save'])){
                            require 'connection.php';
                            extract($_POST);
                            $sql = "INSERT INTO `tenant`(`tenant_id`, `name`, `id_no`, `primary_phone`, `secondary_phone`, `email_address`)
                             VALUES ('null','$name','$id_no','$p_no','$s_no','$email')";
                              mysqli_query($con,$sql) or  die(mysqli_error($con));
                              header('location:tenants.php');
                        }

                        ?>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="">Your Name</label>
                            <input type="text" name="name" class="form-control px-2 mt-1" required>
                            </div>
                            <div class="form-group">
                                <label for="">Your ID Number</label>
                            <input type="number" name="id_no" class="form-control px-2 mt-1" required>
                            </div>
    
                            <div class="form-group">
                                <label for="">Primary Phone Number</label>
                            <input type="number" name="p_no" class="form-control px-2 mt-1" required>
                            </div>
                            <div class="form-group">
                                <label for="">Secondary Phone Number</label>
                            <input type="number"  name="s_no" class="form-control px-2 mt-1" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control px-2 mt-1" required>
                            </div>
                    </div>
                    <div class="modal-footer">
    
                        <button type="submit" name="save" class="btn btn-info">Save</button>
                    </div>
                    </form>
    
    
    
                </div>
            </div>
        </div>
    </div>
    <?php
include 'footer.php'
?>