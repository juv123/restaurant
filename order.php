<?php
session_start();
$arrlength=0;$arrlength1=0;
$con=mysqli_connect("localhost","root","","restaurant");
if($con==false)
die("error".mysqli_connect_error());
$customer='';$contactno=0;$address='';
$user=0;
if(isset($_SESSION["uid"])){
$user=$_SESSION["uid"];
if($user>0){
$sql="select * from customer where `id`=$user";
if($result=mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
    $customer=$row[1];
    $contactno=$row[4];
    $address=$row[5];
  
    }
}
}
}
$sum=0;
                if(isset($_POST['select'])){
                    $menuid=array();

                    $menuid=$_POST['select'];
                    $arrlength = count($menuid);

                   }
                  
                   

               
                   $quantity=array();
                   if(isset($_POST['quantity'])){

                   $quantity=$_POST['quantity'];
                   }
                   if(isset($_POST['menuid'])){
					   $menuid=array();
                   $menuid=$_POST['menuid'];
                   $arrlength =count($menuid);
                   }
                   $arrlength1 =count($quantity);

               if($arrlength>0){
                   for($x = 0; $x < $arrlength; $x++) {
                   
                                     
                    
                $sql="select name,price from menu where `status`=0 and `id`=$menuid[$x]";
                if($result=mysqli_query($con,$sql))
                {
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result))
                    {
                    $food=$row[0];
                    $price=$row[1];
                  
           $quantity=1;
           
            $total=$price*$quantity;
            $sum=$sum+$total;
            

                    
   
            
        }

    }

}
}
}        

           ?>

                    
                    <!doctype html>
                    <html>
                    <head>
                    <title>Order</title>
                    <style>
                    a{
                        text-decoration:none;
                    }
                    </style>
                    </head> 
                    <body>

                    <form id="order" name="order" method="post" action="">
                    
                    <input type="hidden" name="food[]" value="<?php echo$food;?>"readonly>
                    <input type="hidden" name="price" value="<?php echo$price;?>"readonly>
                    <input type="hidden" name="total" value="<?php echo$sum;?>"readonly>


            <div class="order_head">
                <div class="row">
                    
                    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                        <div class="inputspan">
                            <label>Date</label>
                            <input id="date" type="date" name="order_date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="order_head address_head" style="background: #bdc0c4;color: #fff;border-radius: 2px;">
                <label>Customer Details</label>
            </div>
            <div class="order_body tab-active">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Name</div>
                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                    name="name"
                                                                                                    id="full_name" value="<?php echo$customer;?>"readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Contact Number</div>
                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                    name="mobilenumber"value="<?php echo$contactno;?>"
                                                                                                    id="contact_number"readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 padBottom10 labelText"> Address</div>
                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8 padBottom10 labelText"><input type="text"
                                                                                                    name="address"
                                                                                                    id="address" value="<?php echo$address;?>"readonly></div>
                    </div>
                   


            <div class="order_head" style="background: #bdc0c4;color: #fff;border-radius: 2px;">
                <label>Order Info</label>
            </div>
            <div class="order_body tab-inactive">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed " style="font-size:14px;" id="orders" name="orders">
                        <thead>
                        <tr style="color: #4f9ce6; background: #ffffff;" class="tableHead">
                            <th>Food Item</th>
                            <th>Unit Cost</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <?php  if($arrlength>0){
                      for($x = 0; $x<$arrlength; $x++) {
                                    
                                  
                $sql="select name,price from menu where `id`=$menuid[$x]";
                if($result=mysqli_query($con,$sql))
                {
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result))
                    {
                    $food=$row[0];
                    $price=$row[1];
					$id=$menuid[$x];?>
                  
                        <tbody class="body-row">
                        <tr class="item-row">

                            <td readonly><?php echo$food;?>
        
  
                            </td>
							<input type="hidden" name="menuid[]" value="<?php echo$id;?>">
                            <td class="item-name">
                                <div class="delete-wpr">
                                <?php echo$price;?>
                                </div>
                            </td>
                            <td><select id="qty" name="quantity[]" class="qty" onchange="updateTotal(this.value)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select></td>
                            <td><input type="text" id="cost" name="cost[]" value="<?php echo$price;?>"readonly></td>
                        </tr>


                       
                        <input type="hidden" id="order_id" name="order_id"/>
                        <input type="hidden" id="unitcost" value="<?php echo$price;?>" name="unitcost[]"/>
                        <input type="hidden" id="sum" value="<?php echo$sum;?>"/>


                        </tbody>
                        <?php }
                    }
                }
            }}?>
                    </table>
                   
                </div>


                
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-sx-9 col-lg-9"><h3>Total Amount</h3></div>
                    <div class="col-md-3 col-sm-3 col-sx-3 col-lg-3">
                        <h3>
                            <div class="total"  name="total"><input type="text" id="tot" value="<?php echo$sum;?>"readonly></div>
                        </h3>
                    </div>
                </div>
            </div>

                           
                          
                            <labeL>Entered By:<input type="text" name="waiter">
                            </label>
                <div class="row" style="padding: 30px;">
                    <div class="pull-right">
                        <input type="submit" id="orderinsert" name="orderinsert" value="order">
                        <button type="button" id="ordercancel">cancel</button>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<?php }
else{
	echo"Please Login to make your Order";
}?>
<a href="home.php">Back to HOME</a>
<?php
 if(isset($_POST['menuid'])){
    $menuid=array();

    $menuid=$_POST['menuid'];
    $arrlength = count($menuid);

   }
if(isset($_POST['orderinsert'])){
        $food=$_POST['food'];
    $price=$_POST['price'];
    $total=$_POST['total'];
        $customer=$_POST['name']; 
    $contactno=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $waiter=$_POST['waiter'];
    $when=$_POST['order_date'];
	$menuid=array();
    $menuid=$_POST['menuid'];
    $quantity=$_POST['quantity'];
    $sql = "INSERT INTO `order`(`id`,customerid,waiter,`when`,amount,`status`)
    VALUES ('',$user,'$waiter','$when',$total,0)";
     
    if(mysqli_query($con, $sql)){
        $last_id = mysqli_insert_id($con);
        echo"<script>alert('Your order is given to kitchen.Plz wait,your food will be ready within a few minutes...');</script>";

      } else{
      echo "ERROR: Could not able to execute $sql." . mysqli_error($con);
    }
    for($x=0;$x<$arrlength;$x++) { 
       
        $sql1="INSERT INTO order_details(`id`, orderid, menuid, quantity, status)
         VALUES ('',$last_id,$menuid[$x],$quantity[$x],0)";
                 
          
        if(mysqli_query($con, $sql1)){
                     } else{
              echo "ERROR: Could not able to execute $sql1." . mysqli_error($con);
            }  
   
   
    
}}?>
                    </body>
                    <script>
                 
                 var total=0; var sum=0;
function updateTotal(qty){   
   
  
       //var qty=document.getElementById('qty').value;
      
       var price=document.getElementById('unitcost').value;
       if (!isNaN(price) && !isNaN(qty)) {
                    total+=price*qty;
                }
      // total+=price*qty;
      
       document.getElementById('cost').value=total;
       var amount=document.getElementById('cost').value;

       //sum=sum+amount;
       // alert(sum);
       document.getElementById('tot').value=amount;

    
}

/*$(document).ready(function(){
    var $tblrows = $("#orders tbody tr");
$tblrows.each(function (index) {
    var $tblrow = $(this);
 
    
});
//var $tblrow = $("#orders tr:gt(0)");
$tblrow.find('.qty').on('change', function () {
 
 var qty = $tblrow.find("[name=quantity]").val();
 var price = $tblrow.find("[name=cost]").val();
 var subTotal = parseInt(qty,10) * parseFloat(price);
  
 
 });
 if (!isNaN(subTotal)) {
 
 $tblrow.find('.total').val(subTotal.toFixed(2));
 
}
if (!isNaN(subTotal)) {
 
 $tblrow.find('.total').val(subTotal.toFixed(2));
 var grandTotal = 0;

 $(".total").each(function () {
     var stval = parseFloat($(this).val());
     grandTotal += isNaN(stval) ? 0 : stval;
 });

 $('.total').val(grandTotal.toFixed(2));
}
});   */      
          </script>
                    </html>