    
<style>
input[type="submit"]{
    width:120px;
    height:60px;
    font-size:20px;
}
</style>

    
           
      <?php
  
     $con=mysqli_connect("localhost","root","","restaurant");
     if($con==false)
     die("error".mysqli_connect_error());
$category='';
if(isset($_SESSION['uid']))
$id=$_SESSION['uid']; 
if(isset($_GET['category'])){
$category=$_GET['category'];



?>
 
<form method="post" action="order.php">
<div id="<?php echo$category;?>">


           

           
                   
          <?php   
                 $sql="select name,image,price,description,quantity,`id` from menu where status=0 and category='$category'";
                    if($result=mysqli_query($con,$sql))
                    {
                      if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result))
                        {
                        $food=$row[0];
                        $image=$row[1];
                        $price=$row[2];
                        $description=$row[3];
                        $quantity=$row[4];
                        $id=$row[5];
                        
                        ?>
         <img src="images/<?php echo$image;?>" width="600px"/> 
      <h1><b><?php echo$food;?></b><span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo$price;?></span></h1>
      <input type="checkbox" name="select[]" value="<?php echo$id;?>"/>

      <p class="w3-text-grey"><?php echo$description;?></p>

      <hr> 
                        <?php
                      
                    }
                  
          ?>
                
                 <input type="submit" value="Place Order"/>

          </form>
       <?php }
	     }
                  }
                   ?>