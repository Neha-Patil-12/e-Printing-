<?php
 session_start();
 include "connect_db.php";
if(isset($_POST['email'])&& isset($_POST['password']))
{


    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

   
    $semail=validate($_POST['email']);
    $password=validate($_POST['password']);
    
    if(empty($semail)){
        echo "<script type=\"text/javascript\">
        alert(\"User Email is Require\");
        window.location='shoplogin.php';
        </script>";
        exit();
    }
    else if(empty($password))
    {
        echo "<script type=\"text/javascript\">
                alert(\"Password is Require\");
                window.location='shoplogin.php';
                </script>";
        exit();
    }
    else{
       $sql="SELECT * FROM shopuser_register WHERE email='$semail' AND pass='$password'";
       $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)===1){
           $row=mysqli_fetch_assoc($result);
           if($row['email']===$semail && $row['pass']===$password){
               $_SESSION['semail']=$row['email'];
               $_SESSION['password']=$row['pass'];
               $_SESSION['oname']=$row['name'];
               echo "<script type=\"text/javascript\">
                alert(\"Login Sucessfully!\");
                window.location='shopuser_page.php';
                </script>";
         
               exit();
           }
       }
       else{
        echo "<script type=\"text/javascript\">
        alert(\"Invalid email or password!\");
        window.location='shoplogin.php';
        </script>";
          
           exit();
       }
    }
}
   
mysqli_close($con);

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
               background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.8)),url("../project/images/img4.jpg");
               background-position:center;
                background-size:cover;
                background-size:border-box;
              
        }

 .container::before
 {
     content:'';
	  position:absolute;
	  top:0;
	  left:0;
	  width:91%;
	  height:25%;
	  background:linear-gradient(45deg,#58cce0,#fc96fc);
	  border-radius:0 0 50% 90%/0 0 50% 90%;
	  transform:scaleX(1.2);
 }


 .header{
    position: relative;
    height:8%;
    
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
    margin: 15px;
    margin-left: 28%;
    width: 70%;
    height:100%;
   position: relative;
    padding-left: 2%;
    
}

.form{
    margin: 15px;
    background:rgba(0,0,0,0.79);
    height:60%;
    width:60%;
    margin-left: 20%;
    margin-top: 10%;
    
}

p{
    text-align: center;
    font-size: 30px;
    color: #ff4500;
    font-weight: bold;
    padding-top: 5%;
    
}

.form label{
    font-size: 20px;
    color: #fff;
    padding-right: 10px;
    margin-left:7em;
}
.form input{
    height: 7%;
    width: 30%;
}

button{
    margin-left:40% ;
    height: 10%;
    width: 15%;
    border-radius:15px 15px 15px 15px;
    font-size:20px;
}

button:hover{
    background-color: #ff4500;
    color:#fff;
    transition:0.5s;
    width: 16%;
}

.form img{
    height:60%;
    width:24%;
    position:absolute;
}
.error{
    background:#f2dede;
    color:#a94442;
    padding:10px;
    width:95%;
    border-radius:5px;
    margin:20px auto;
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
                <li><a href="register.php">Register</a></li>
                <li><a href="home.html">Home</a></li>
            </b> </ul>
            <img src="images/img3.jpg">
        </div>

        <p class="tri1"></p>
        <div class="tri2"></div>
        <div class="tri4"></div>
        <div class="form">
            <img src="../project/images/img2.jpg">
            <form action="shoplogin.php" method="POST">
                <div class="reg">
                <p>Login</p>
                <br><br><br>
                <label>Email</label> 
                <input type="text" name="email" >
                <br><br><br>
                <label>Password</label> 
                <input type="password" name="password" >
                <br><br><br><div class="tri3"></div>
               <button type="submit" name="submit" value="submit">Login</button>
               <br><br><br>
               <a href="userlogin.php">Login as User</a>
               </div>
            </form>
        
    </div>
    </div>
    </body>
</html>
