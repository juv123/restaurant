 
 <?php
session_start();
    $con=mysqli_connect("localhost","root","","restaurant");
if($con==false)
die("ERROR".mysqli_connect_error());
if(isset($_SESSION['uid'])){
$customer=$_SESSION['uid'];
$sql1="select count(*) from `order` where customerid=$customer and status=0";

$result1=mysqli_query($con,$sql1);

  $row1=mysqli_fetch_array($result1);
    
      $_SESSION['orderno']=$row1[0];
     mysqli_close($con);

}
?>
<a id="cart" href="home.php?orderby=<?php echo$customer;?>" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-shopping-cart"></span> my Orders(<?php  if(isset($_SESSION['orderno'])) echo $_SESSION['orderno'];?>)
             </a>
          