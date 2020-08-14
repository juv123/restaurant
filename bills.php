 
<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<style>
a{
	text-decoration:none;
}
</style>
</head>
<body>
<div class="row">
    <span class="dashboard-table-title"> BILLING </span>
    <span class="dashboard-table-title" id="what"> FOR </span>
    <span id="select-user" class="dashboard-table-title" style="color:#019be5;"></span>
    <form id="cust" method="post" action="">
    <select name="customer" id="customer">
    <option value="0">Choose Customer</option>

    <?php $con=mysqli_connect("localhost","root","","restaurant");
                    if($con==false)
                    die("error".mysqli_connect_error());
				 $orderid=0;
            $menuid=0;
            
         
                $sql="select * from `order` where `status`=0";
                if($result=mysqli_query($con,$sql))
                {
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result))
                    {
                    $order=$row[0];
                    $customer=$row[1];
                    $amount=$row[4];
               
            	 $sql1="select username,contactno,address from `customer` where`id`=$customer";
                if($result1=mysqli_query($con,$sql1))
                {
                  if(mysqli_num_rows($result1)>0){
					 
					  
                    while($row=mysqli_fetch_array($result1))
                    {
                    $customername=$row[0];
                    $contactno=$row[1];
                    $address=$row[2];
					
					?>
                    <option value="<?php echo$order;?>"><?php echo$customername;?></option>
<?php					 
					
            
					
					}
					}
				}				  
					}
				 
    }
				
 ?>
				
			
            </select>
		<button type="button" onclick="selectCustomer()">Generate Bill</button>
            </form>    
<?php
}?>
<div id="new" style="display:none">
       <form id="bill" method="post" action="">
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
               <label>Customer Details</label>
           </div>
           <div class="bill_body tab-active">
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Name</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="name" value="<?php echo $customername;?>"
                                                                                                   id="full_name"readonly>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Contact Number</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="mobilenumber" value="<?php echo$contactno;?>"
                                                                                                   id="contact_number"readonly>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Address</div>
                   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                   name="address" value="<?php echo$address;?>"
                                                                                                   id="address"readonly></div>
                  
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
                          
                        <input type="hidden" name="order" value="<?php echo$order;?>">
<?php
     if($order>0){
      $sql="select * from `order` where `id`=$order";
      if($result=mysqli_query($con,$sql))
      {
          if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_array($result))
              {
                  $amount=$row[4];
              }
            }
        }
             
           $sql="select * from `order_details` where orderid=$order";
           if($result=mysqli_query($con,$sql))
           {
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_array($result))
                   {
                  
                   $quantity=$row[3];
                   $menuid=$row[2];
				 
                   
                  
           $sql1="select name,price from `menu` where `id`=$menuid";
           if($result1=mysqli_query($con,$sql1))
           {
               if(mysqli_num_rows($result1)>0){
                   while($row=mysqli_fetch_array($result1))
                   {
                   $foodname=$row[0];
                   $price=$row[1];
                   
                   ?>
                              <td>  <input type="text" value="<?php echo$foodname;?>" name="food"readonly />
                              
                           </td>
                          
                           <td><input type="text" id="cost" name="cost[]" value="<?php echo $price;?>" class="form-control cost"readonly></td>
                           <td><input type="text" class="form-control qty" value="<?php echo $quantity;?>" name="quantity"readonly></td>
                           <td><span class="price"><?php echo$price;?></span></td>
                       </tr>
						<?php }
                }
            }
         }
			   }
		   }?>

                       <tr>
                           <td colspan="1" class="blank"></td>
                           <td colspan="2" class="total-line">Subtotal</td>
                           <td class="total-value">
                               <div id="subtotal"readonly><?php echo$amount;?></div>
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
                           <div class="total" readonly><?php echo$amount;?></div>
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
                           <option value="cash">Cash</option>
                           <option value="card">Card</option>
                       </select>
                   </div>
				   
                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText">
                  <label>Amount Paid: <input type="text" id="total" name="amount"/>
                  </label>
                   </div>
              
 <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText">
 <label>Tip(If any): <input type="text" id="tip" name="tip"/>
                  </label>
                 
				  </div>
				   <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText">
                  <label>Entered By: <input type="text" id="enteredby" name="enteredby"/>
                  </label>
                   </div>
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
</div>
        <?php }
 if(isset($_POST['order']))
 $orderid=$_POST['order'];
// echo$orderid;
  if(isset($_POST['billinsert'])){
     
    $date=$_POST['bill_date'];
    $paymentmode=$_POST['paymentmode'];
    $paid=$_POST['amount'];
    $enteredby=$_POST['enteredby'];
    $tip=$_POST['tip'];
    if($paid==$amount){
    $sql = "INSERT INTO `bills`(`id`,`date`,orderid,billamount,paidamount,paymentmode,tip,enteredby,`status`)
    VALUES ('','$date',$orderid,$amount,$paid,'$paymentmode',$tip,'$enteredby',0)";
    }
    else{
        echo"<script>alert('please pay your full bill amount.');</script>";

    }
    if(mysqli_query($con, $sql)){
		
    echo"Your Bill generated Successfully";
      } else{
      echo "ERROR: Could not able to execute $sql." . mysqli_error($con);
    }
	 $sql2="update `order` set `status`=1 where`id`=$orderid";
	if(mysqli_query($con, $sql2)) {
  //echo"Record updated successfully";
} else {
      echo "ERROR: Could not able to execute $sql2." . mysqli_error($con);
}
}
?>
<a href="home.php">Back to HOME</a>

   </body>        
<script>
var f=0;
function selectCustomer(){
   f=document.getElementById('customer').value;
  //alert(f);
            if(f>0)
            {
                $.ajax({
                    //type:"POST",
                    url:"bills.php?customer="+f,
                    success:function(res)
                    {
                  
                        $("#new").css({ display: "block" });

                                           }
                });
            }
        
}

</script>


</html>