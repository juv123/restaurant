<?php
        $con=mysqli_connect("localhost","root","","restaurant");
        if($con==false)
        die("error".mysqli_connect_error());    
           if(isset($_GET['customer']))
           $orderid=$_GET['customer'];
           $sql="select * from `order` where `id`=$orderid";
           if($result=mysqli_query($con,$sql))
           {
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_array($result))
                   {
                   $customername=$row[2];
                   $contactno=$row[3];
                   $address=$row[4];
                   $amount=$row[9];
                   $quantity=$row[8];
                   $menuid=$row[6];
                   
                   }
               }
           }
           $sql="select name,price from `menu` where `id`=$menuid";
           if($result=mysqli_query($con,$sql))
           {
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_array($result))
                   {
                   $foodname=$row[0];
                   $price=$row[1];
                   }
                }
            }
                   ?>

       <form id="bill" method="post" action="bills.php">
           <div class="bill_head">
               <div class="row">
                  
                   <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                       <div class="inputspan">
                           <label>Date</label>
                           <input id="date" type="date" name="bill_date">
                       </div>
                   </div>
               </div>
           </div>
           <div class="bill_head address_head" style="background: #bdc0c4;color: #fff;border-radius: 2px;">
               <label>Customer</label>
           </div>
           <div class="bill_body tab-active">
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Name</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="name" value="<?php echo $customername; ?>"
                                                                                                   id="full_name">
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Contact Number</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="mobilenumber" value="<?php echo$contactno;?>"
                                                                                                   id="contact_number">
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Address</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="address" value="<?php echo$address;?>"
                                                                                                   id="address"></div>
                  
           <div class="bill_head" style="background: #bdc0c4;color: #fff;border-radius: 2px;">
               <label>Billing Info</label>
           </div>
           <div class="bill_body tab-inactive">
               <div class="table-responsive">
                   <table class="table table-striped table-condensed " style="font-size:14px;">
                       <thead>
                       <tr style="color: #4f9ce6; background: #ffffff;" class="tableHead">
                           <th>Food</th>
                           <th>Unit Cost</th>
                           <th>Quantity</th>
                           <th>Price</th>
                       </tr>
                       </thead>
                       <tbody class="body-row">
                       <tr class="item-row">
                           <td>
                               <input type="text" value="<?php echo$foodname;?>" name="food[]" />
                              
                           </td>
                          
                           <td><input type="text" id="cost" name="cost[]" value="<?php echo $price;?>" class="form-control cost"></td>
                           <td><input type="text" class="form-control qty" value="<?php echo $quantity;?>" name="quantity"></td>
                           <td><span class="price"><?php echo$price;?></span></td>
                       </tr>


                       <tr>
                           <td colspan="1" class="blank"></td>
                           <td colspan="2" class="total-line">Subtotal</td>
                           <td class="total-value">
                               <div id="subtotal"><?php echo$amount;?></div>
                           </td>
                           <td colspan="1" class="blank"></td>

                       </tr>
                                              </tbody>
                   </table>
               </div>



               <div class="row">
                   <div class="col-md-9 col-sm-9 col-sx-9 col-lg-9"><h3>Total Amount</h3></div>
                   <div class="col-md-3 col-sm-3 col-sx-3 col-lg-3">
                       <h3>
                           <div class="total"><?php echo$amount;?></div>
                       </h3>
                   </div>
               </div>
           </div>

           <div class="bill_head" style="background: #bdc0c4;color: #fff;border-radius: 2px;">
               <label>Payment</label>
           </div>
           <div class="bill_body tab-inactive">
               <div class="row">
                   <div class="col-md-3 col-sm-3 col-sx-3 col-lg-3">Payment Mode</div>
                   <div class="col-md-9 col-sm-9 col-sx-9 col-lg-9">
                       <select id="payment_method" name="paymentmode" class="select_box">
                           <option value="0">Cash</option>
                           <option value="1">Card</option>
                       </select>
                   </div>
                   <div class="row" id="total_amounts">
                  <label>Amount Paid: <input type="text" id="total" name="amount"/>
                  </label>
                   </div>
               </div>
               <div class="row">
                  <label>Tip(If any): <input type="text" id="tip" name="tip"/>
                  </label>
                  <br>
                  <label>Entered By: <input type="text" id="enteredby" name="enteredby"/>
                  </label>
                   </div>
               </div>
              
                   <div class="row" style="padding: 30px;">
                   <div class="pull-right"><label></label>
                       <input type="submit" name="billinsert" id="billinsert" class="packagebtn editInfoBtn">
                   </div>
               </div>

           </div>
       </form>
   </div>
</div>
<?php
  if(isset($_POST['billinsert'])){
    $date=$_POST['bill_date'];
    $paymentmode=$_POST['paymentmode'];
    $paid=$_POST['amount'];
    $enteredby=$_POST['enteredby'];
    $tip=$_POST['tip'];
    $sql = "INSERT INTO `bills`(`id`,`date`,orderid,billamount,paidamount,paymentmode,tip,enteredby,`status`)
    VALUES ('','$date',$orderid,$amount,$paid,'$paymentmode',$tip,'$enteredby',0)";
    if(mysqli_query($con, $sql)){
    echo"Your Bill generated Successfully";
      } else{
      echo "ERROR: Could not able to execute $sql." . mysqli_error($con);
    }
}
?>

<a href="bills.php">Prev</a>