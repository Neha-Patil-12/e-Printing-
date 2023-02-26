<?php
session_start();
include "connect_db.php";
if(isset($_SESSION['oname'])&& isset($_SESSION['semail'])){


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


.header{
    background-color: black;
    height:6.4%;
}
.header img{
    height: 100%;
    width: 5%;
    position: relative;
    border-radius: 20%;    
}

.header ul li{
    display:flex;
    padding: 12px;
   float: right;
   text-align: center;

}

.header ul li a{
    text-decoration: none;
    font-size: 20px;
    color: #fff;
}

.header ul li:hover{
    background: #b316fcfb;
    display:block;
    transition-duration: 0.8s;
}

li button{
    height:30px;
    width:100%;
    font-size:20px;
    color:#fff;
    text-align:left;
    background-color: rgba(0, 0,0, 0);  
    border:none;
    ttext-decoration:none;
}

.welcome{
    height: 93%;
    width:15%;
    position:absolute;
   background-color: rgba(0, 0,0, 0.95);  
  
}

.space{
    height: 93%;
    width:100%;
    background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.8)),url("../project/images/img5.jpg");
   background-position:center;
    background-size:cover;
    background-size:border-box;
    float:right;

}

h2{
   padding: 4%;
   font-size:44px;
   color:#fff;
}

.option li{
     margin: 2%;
     padding:5%;
     margin-top: 4%;
     text-decoration: none;
     list-style: none;
     font-size: 20px;
     color:#fff;
}

.option li:hover{
    background: #b316fcfb;
    display:block;
    transition-duration: 0.8s;
}
.option li a{
    list-style: none;
     font-size: 20px;
     color:#fff;
}
.row{
    background:rgba(0,0,0,0.65);
                height:93%;
                width: 85%;
                font-family:'Times New Roman', Times, serif ;
                outline: none;
                text-decoration: none;    
                position:absolute;
                margin-left:15%;  
              
}

        </style>    

    </head>
    <body>
        <div class="container">
        <div class="header">
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <img src="images/img3.jpg">
        </div>
        <div class="welcome">
            
                <h2>Welcome <br><?php echo  $_SESSION['oname']; ?></h2>
           <br>
            <div class="option">
            <form method='post'>
             <ul >
             <li><button  type="submit"  name="profile" style=none>PROFILE</button></li>
                <li><button  type="submit"  name="req" style=none>REQUESTS</button></li>
                <li><button  type="submit"  name="pfile" style=none>FILES TO PRINT</button></li>
            
            </ul>
            </form>
            </div>
          
        </div>
        <div class="space">
            <div class="row">
        <?php
    
        if(isset($_POST['req']))
        {  
            include "shop_request.php";
           
       }

       if(isset($_POST['profile']))
       {
           include "profile.php";
       }

       if(isset($_POST['pfile']))
       {
           include "fileToPrint.php";
       }

        ?>
        </div>
        </div>
    </div>
    </body>
</html>

 <?php
}
 ?>   
    