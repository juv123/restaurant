
<!doctype html>
<html>
    <head>
    <title>Restaurant</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

        
    
<style>
    a{
        text-decoration:none;
        font-size:30px;
    }
    .mainmenu{
        display:flex;
        flex-direction:row;
        height:300px;
        width:200px;
        
    }
    .log{
        height:40px;
        width:40px;
        padding:10px;
    }
    #login{
      position:relative;
      height:200px;
        width:400px;
        
    }
    #signup{
      position:relative;
      height:400px;
        width:400px;
    }
    
        
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("images/bg.jpg");
  min-height: 90%;
}

input{
    display: float;
    float:right;
    width:200px;
    height:40px;
    font-family: "Amatic";
}
input[type="checkbox"] {
    width: 24px;
    height: 24px;
    vertical-align: right;
}

input[type="submit"]{
  width: 70px;
    height: 40px;
}
input[type="button"]{
  width: 70px;
    height: 40px;
}
    </style>
</head>
    <body>
    
    <?php session_start();

 if(isset($_SESSION["uid"])){?>
<p id="welcome">welcome,<label id="username"><?php if(isset($_SESSION['user'])) echo $_SESSION["user"];?></label></p>
        <a href="home.php?logout=<?php echo $_SESSION["uid"];?>" class="log" id="logout">logout</a>
<?php } else {?>
<a href="#" class="log" onclick="logopt()">login</a>
<?php }?>
            
            <a href="#" class="log" onclick="regopt()">signup</a>
            
            <div id="signup" style="display:none;">
                    <form name="regform" action="" method="post">
                    username :<input type="text" id="user" name="user" value="" required>
                    <br><br>
                    Password :<input type="password"  id="password" name="password"value="" required>
                      <br><br>
                     Email Id :<input type="email" id="mail" name="mail" value="" required>
                      <br><br>
                    ContactNo :<input type="number"  id="phno" name="phno" value="" required>
                    <br><br>
                    Address :<input type="text" id="address" name="address" value="" required>
                     
                     
                    <br><br>
                    <input type="button" id="clearbtn" name="clearbtn" value="Reset" onclick="reset()">

                    <input type="submit" id="regbtn" name="regbtn" value="Register" onsubmit="signup()">
                    
                    
    
                    </form>
                </div>

            <div id="login" style="display:none;">
                
                <form name="lgform" action="" method="post">
                   user name:<input type="text" id="uname" name="uname" value="" required>
                <br><br>
                  Password :<input type="password"  id="pwd" name="pwd" value="" required>
                <br><br>
                <input type="button" id="cancelbtn" value="cancel" onclick="cancel();"/>

                <input type="submit" id="lgbtn" name="lgbtn" value="login"/>
              
                

                </form>
            </div>
           <!-- <div id="ordernum">
        <a id="cart" href="order.php?orderby=<?php// if(isset($_SESSION['uid'])) echo$_SESSION['uid'];?>" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-shopping-cart"></span> my Orders(<?php// if (isset($_SESSION['orderno'])) echo $_SESSION['orderno'];?>)
             </a>
                  </div>  --> 
<div class="bgimg w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:100px">MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'starter');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Starters</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'breakfast');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Breakfast</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'lunch');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Lunch</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'dinner');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Dinner</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'snacks');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Snacks</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'drinks');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Beverages</div>
      </a>
    </div>
    

    <?php
  
     $con=mysqli_connect("localhost","root","","restaurant");
     if($con==false)
     die("error".mysqli_connect_error());
$category='';
if(isset($_SESSION['uid']))
$id=$_SESSION['uid']; 

?>
<div id="mymenu">
          </div>
                <?php 
                 if(isset($_POST['regbtn'])){
                  $user=$_POST['user'];
                  $password=$_POST['password'];
                  $mail=$_POST['mail'];
                  $phno=$_POST['phno'];
                  $address=$_POST['address'];
            
                  
                  $sql1 = "INSERT INTO customer(`id`,username,password,email,contactno,address,status)
            
            VALUES ('','$user','$password','$mail',$phno,'$address',0)";
            if(mysqli_query($con, $sql1)){
            echo"<script>alert('Customer Registered Successfully')</script>";
              } else{
              echo "ERROR: Could not able to execute $sql." . mysqli_error($con);
            }
          }
          if(isset($_POST['lgbtn']))
          {
      
          $name=$_POST['uname'];
          $password=$_POST['pwd'];
      
         
         
          $sql="select * from `customer` where username='$name'";
          $result=mysqli_query($con,$sql);
          
            
            
      $row=mysqli_fetch_row($result);
       if($password==$row[2])
       {
                $_SESSION["uid"]=$row[0];;
      
       $username=$row[1];
       $_SESSION["user"]=$row[1];
       }
       if(isset($_SESSION["uid"])){
         $id=$_SESSION['uid'];
          $sql1="update customer set status=1 where `id`=$id";//online users
      
          if(mysqli_query($con,$sql1)){
            //echo "logined successfully.";
          } else{
            echo "ERROR: Could not able to execute $sql1." . mysqli_error($con);
          }
        }
      }
        if(isset($_GET['logout']) && isset($_SESSION['uid']))
        {
         $id=$_SESSION['uid'];
        
         $sql2="update customer set status=0 where `id`=$id";  //online users
     
       
         if(mysqli_query($con,$sql2)){
           
          unset($_SESSION["uid"]);
           unset($_SESSION["user"]);
     
         } else{
           echo "ERROR: Could not able to execute $sql2." . mysqli_error($con);
         }
     
        }
          ?>
                </div>
                </div>

                </div>

<div>
<a href="bills.php">Billing</a>

</div>

<script>
 $(function ()
{
   var refreshId = setInterval(function() {
   

      $("#ordernum").load('numorders.php');
   }, 500);
   $.ajaxSetup({ cache: false });
document.getElementById('signup').style.display='none';
document.getElementById('login').style.display='none';
});

 function regopt()
        {
        

           var regdiv=document.getElementById('signup');
           var lgndiv=document.getElementById('login');
           lgndiv.style.display='none';
  if(regdiv.style.display == "none") {
    regdiv.style.display = "block";
  } else {
    regdiv.style.display = "none";
  }
} 
        function logopt()
        {
        
          var regdiv=document.getElementById('signup');
          regdiv.style.display = "none";
           var lgndiv=document.getElementById('login');
           
  if(lgndiv.style.display == "none") {
    lgndiv.style.display = "block";
  } else {
    lgndiv.style.display = "none";
  }
} 

function signup(){

var name=document.getElementById('user').value;
 var password=document.getElementById('password').value;
 var email=document.getElementById('mail').value;
 var contact=document.getElementById('phno').value;
 var address=document.getElementById('address').value;

 if(name==''|| password==''||email==''||contact==''||address=='')
 alert("please fill the required fields");

else
{

//insert into customer table with auto id
alert(name+'is registered successfully');

document.getElementById('user').value='';
document.getElementById('password').value='';
document.getElementById('mail').value='';
document.getElementById('phno').value='';
document.getElementById('address').value='';

document.getElementById('signup').style.display="none";

}
}  
function reset()
   {
    document.getElementById('user').value='';
document.getElementById('password').value='';
document.getElementById('mail').value='';
document.getElementById('phno').value='';
document.getElementById('address').value='';



   } 
   function cancel()
   {
    document.getElementById('uname').value='';
document.getElementById('pwd').value='';
   } 

// Tabbed Menu
function openMenu(evt, menuName) {
  //evt.preventDefault();
  $.ajax ({
            url: "menu.php?category="+menuName,
            success: function(result ) {
               $("#mymenu").html(result);
            }
        });
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
 
}

//document.getElementById("myLink").click();
</script>
</body>
</html>