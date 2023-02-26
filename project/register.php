<?php
session_start();
include "connect_db.php";
if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['sname'])&& isset($_POST['address'])
&& isset($_POST['image'])&& isset($_POST['singleside'])&& isset($_POST['bothside'])&& isset($_POST['submit']))
{

    $_SESSION['oname']=$_POST['name'];
    $_SESSION['semail']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['sname']=$_POST['sname'];
    $_SESSION['saddress']=$_POST['address'];
    $image=$_POST['image'];
    $submit=$_POST['submit'];
    $singlecost=$_POST['singleside'];
    $bothcost=$_POST['bothside'];

$sql="CREATE TABLE IF NOT EXISTS shopuser_register (rid int(11) AUTO_INCREMENT primary key ,name varchar(20),email varchar(20), pass varchar(100),shopname varchar(50) NOT NULL,
            shopaddress varchar(50),cost_of_singleside int,cost_of_bothside int,shopimage varbinary(100));";

if(!mysqli_query($con,$sql))
{
    echo "Error creating table:".mysqli_error($con); 
}


$query="INSERT INTO shopuser_register (name,email,pass,shopname,shopaddress,cost_of_singleside,cost_of_bothside,shopimage)VALUES('$_SESSION[oname]','$_SESSION[semail]','$_SESSION[password]','$_SESSION[sname]','$_SESSION[saddress]','$singlecost','$bothcost','$image')";
if (mysqli_query($con, $query)) {
  
    echo "<script type=\"text/javascript\">
    alert(\"Your information submited sucessfully..\");
    window.location='home.html';
    </script>";
  

  } 
  else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);	
  }


}

?>

<html>
    <head>
        <style>
*{
    margin: 0;
    padding:0;
    font-family:'Times New Roman', Times, serif ;
    outline: none;
    text-decoration: none;

}

.container{
                width:100%;
               height: 100%;
               position:relative;
               background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.8)),url("../project/images/img7.jpg");
               background-position:center;
                background-size:cover;
                background-size:border-box;
              /*background: #f8f8ff;*/
        }

 .container::before
 {
     content:'';
	  position:absolute;
	  top:0;
	  left:0;
	  width:91%;
	  height:13%;
	  background:linear-gradient(45deg,#58cce0,#fc96fc);
	  border-radius:0 0 50% 90%/0 0 50% 90%;
	  transform:scaleX(1.2);
      
 }
            
.header{
   position: relative;
    height:6.4%;
}
.header img{
    height: 100%;
    width: 5%;
    position: relative;
    border-radius: 20%;    
}

ul li{
    display:flex;
    padding: 12px;
   float: right;
   text-align: center;
   margin-right:1%;
   border-radius: 15%;

}

ul li a{
    text-decoration: none;
    font-size: 20px;
    color: #000;
}

ul li:hover{
    background:linear-gradient(45deg,#b563ec,#f0b7f0);
    display:block;
    transition-duration: 0.8s;
    cursor:pointer;
}
.reg{
    margin: 6px;
    margin-left: 28%;
    width: 70%;
    height:90%;
   position: relative;
    padding-left: 2%;
    
}

.form{
    margin: 15px;
    background:rgba(0,0,0,0.79);
    height:67%;
    width:60%;
    margin-left: 20%;
    margin-top: 4%;
}

p{
    text-align: center;
    font-size: 30px;
    color: #ff4500;
    font-weight: bold;
    padding-top:1%;
    
}

.form label{
    font-size: 18px;
    color: #fff;
    padding-right: 10px;
    margin-left:7em;
}
.form input{
    height: 5%;
    width: 30%;
}

.form .cpp{
    width:10%;
    margin-left:1%;
   
}

.uimg{
    color:#fff;
}

button{
    margin-left:45% ;
    height: 8%;
    width: 10%;
    border-radius:15%;
    font-size:20px;
}

button:hover{
    background-color: #ff4500;
    color:#fff;
    transition:0.5s;
    width: 11%;
}

.form img{
    height:67%;
    width:24%;
    position:absolute;
}

.reg a{
    margin:40%; 
    color:#fff;
    font-size :17px;
}

.reg a:hover{
    color:#ff4500;
}

.tri1
{
            width: 0;
            height: 0;
            border-top: 50px solid transparent;
            border-right: 100px solid #AFEEEE;
            border-bottom: 50px solid transparent;
            position: absolute;
            margin-left: 0%;
            margin-top:3%;
        
}
.tri2
{
            width:0;
            height:0;
            border-top: 50px solid transparent;
            border-bottom: 50px solid transparent;
            border-right: 100px solid #AFEEEE;
            border-left: 0;
            position: absolute;
            margin-left:80%;
            margin-top:3%;
        
}
.tri3
{
            width:0;
            height:30;
            border-left: 100px solid transparent;
            border-bottom: 50px solid transparent;
            border-top: 100px solid #AFEEEE;
            border-right:0;
            position: absolute;
            margin-left:100%;
        
}
.tri4
{
            width:0;
            height:0;
            border-top: 50px solid transparent;
            border-bottom: 50px solid transparent;
            border-right: 100px solid #AFEEEE;
            border-left: 0;
            position: absolute;
            margin-left:10%;
            margin-top:35%;
        
}

        </style>
    </head>
    <body>
        <div class="container">
            
        <div class="header">
            <ul><b>
                <li><a href="shoplogin.php">Login</a></li>
                <li><a href="home.html">Home</a></li>
            <b></ul>
            <img src="images/img3.jpg">
        </div>

        <p class="tri1"></p>
        <div class="tri2"></div>
        <div class="tri4"></div>      
        <div class="form">
            <img src="../project/images/img1.jpg">
            <form action="register.php" method="POST">
                <div class="reg">
                <p>Register</p>
                <br><br>
                <label>Enetr your name</label>
                <input type="text" name="name" required>
                <br><br>
                <label>Email</label> 
                <input type="text" name="email" required>
                <br><br>
                <label>Password</label> 
                <input type="password" name="password" required>
                <br><br>
                <label>Shop Name</label> 
                <input type="text" name="sname" required>
                <br><br>
                <label>Shop Address</label> 
                <input type="text" name="address" required>
                <br><br>
                <label>Cost per page</label><br>
                 <span style="color:#fff; font-size:17px; margin-left:20%;">Black & White Print</span>
                <input type="text" class="cpp" name="singleside">
                <span style="color:#fff; font-size:17px;padding-left:2%;"> Colour Print </span>
                <input type="text" class="cpp" name="bothside">
                <br><br>
                <label>Upload Shop Image </label> 
                <input type="file" name="image" class="uimg" onchange="readURL(this);" accept="Image/*" required>  
                <br><br><div class="tri3"></div>
               <button type="submit" name="submit" value="submit">Submit</button>
               <br><br> 
               <a href="userregister.php">Register as User</a>
               </div>
            </form>
        
    </div>
    </div>
    </body>
</html>