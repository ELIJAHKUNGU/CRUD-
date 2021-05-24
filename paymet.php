<?php
include './header.php'
?>
        <div class="col-sm-9 ">
            <div class="ml-auto mt-3">
                <button class="btn btn-info badd1"  data-toggle="modal" data-target="#mypay">Add Tenant</button>
            </div>
            <table class="table-bordered mt-5"> 
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Tenant</th>
                    <th>Invoive</th>
                    <th>Paymet Mode</th>
                    <th>Amount</th>
                    
                    <th>Action</th>
                </tr>
                
                  <?php
                        // get data
                    $qry = "SELECT * FROM paymet";
                    $products =$con->query($qry);
                    while ($row= $products->fetch_assoc())
                    {
                 ?>
                    <tr> 
                        <td><?php echo $row['paymet_id']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['tenant_name']; ?></td>
                        <td><?php echo $row['invoice_no']; ?></td>
                        <td><?php echo $row['payment_mode']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><a href="./delpay.php?id=<?php echo $row['paymet_id']; ?>"><button class="bg-danger text-white btn " >Delete</button> </a>
                      
                        <a href="./uppay.php?id=<?php echo $row['paymet_id']; ?>"><button class="bg-info text-white btn" >Edit</button></a>
                    </td>

                    </tr>
                    <?php } ?>

                
               
            
            </table>
        
        </div>
    </div>
    <div class="container col-sm-6">
        <!-- Modal -->
        <div class="modal fade" id="mypay" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Paymet Details</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
    
                    <div class="modal-body">
                    <?php
                        if(isset($_POST['save'])){
                            require 'connection.php';
                            extract($_POST);
                            $sql = "INSERT INTO `paymet`(`paymet_id`, `date`, `tenant_name`, `invoice_no`, `payment_mode`, `amount`) 
                            VALUES ('null','$date','$tenant_name','$invoice_no','$mode_paymet' ,'$amount')";
                              mysqli_query($con,$sql) or  die(mysqli_error($con));
                              header('location:paymet.php');
                        }

                        ?>
                          <form action="#" method="POST">
                            <div class="form-group">
                                <label for="">Date of Paymet</label>
                            <input type="date" name="date" class="form-control px-2 mt-1" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tenant Name</label>
                            <input type="text" name="tenant_name" class="form-control px-2 mt-1" required>
                            </div>
    
                            <div class="form-group">
                                <label for="">Invoive Number</label>
                            <input type="text" name="invoice_no" class="form-control px-2 mt-1" required>
                            </div>
                            <div class="form-group">
                            <select name="mode_paymet" id="" class="form-control">
                                <option value="">Select Mode Of  Paymet</option>
                                <option value="MPESA">MPESA</option>
                                <option value="Bank Account">Bank Account</option>
                                <option value="Cash">Cash</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label>
                            <input type="number" name="amount" min="0" class="form-control px-2 mt-1" required>
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