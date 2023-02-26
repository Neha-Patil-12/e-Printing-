<?php
 session_start();
include 'connect_db.php';
if(isset($_SESSION['name'])&& isset($_SESSION['email'])&&isset($_POST['send']))
    
    { 
     

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
    height:30%px;
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
   margin: 4%;
   margin-top:8%;
   font-size:44px;
   color:#fff;
   padding-bottom:20%;
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


table{
    margin:2%;
    margin-left:25%;
    font-size:16px;
    border:1px solid black;
}

td{
    background-color:#E4F5D4;
    border:1px solid black;
    font-weight:lighter;
    border :1px solid black;
    padding:4px;
    text-align:center;
  
}

th{
    font-weight:bold;
    border :1px solid black;
    padding:2px;
    text-align:center;
    color:#006600;
    background-color:#e4f5d4;
}




        </style>    

    </head>
    <body>
        <div class="container">
        <div class="header">
            <ul>
                <li><a href="logout.php">Logout</li>
            </ul>
            <img src="images/img3.jpg">
        </div>
        <div class="welcome">
            
                <h2>Welcome <br><?php echo  $_SESSION['name']; ?></h2>
         
            <div class="option">
            <form method='post'>
             <ul >
               
                <li><button  type="submit"  name="uf" style=none>UPLOADED FILES</button></li>
                <li><button  type="submit"  name="ashop" style=none>AVAILABLE SHOPS</button></li>
                <li><button  type="submit"  name="send" style=none>SEND REQUEST</button></li>
                <li><button  type="submit"  name="reqaccept" style=none>REQUEST ACCEPTED</button></li>
            
            </ul>
            </form>
            </div>
        </div>
        <div class="space">
         
        <?php 
    
                    if(isset($_POST['uf']))
                    {
                        ?>
                          <h1 style="margin-left:40%;color:#fff;margin-top:1%;">UPLODED FILES</h1>
                        <?php
        
                        $s="SELECT sno,fname ,date FROM uploaded_files where send_from='$_SESSION[email]'";
                        
                        $r=mysqli_query($con,$s);
                        
                        if(mysqli_num_rows($r))
                        { ?>
                        <table>
                            <tr>
                                <th>File</th>
                                <th>Date</th>
                        </tr>
                        <?php
                            while($rw=mysqli_fetch_assoc($r))
                            {
                                $sno1=$rw['sno'];
                                $file1=$rw['fname'];
                               // <td>". $rw['fname']."</td>
                                echo"<tr>
                                 <td><a href='download.php?sno=$sno1' >".$file1."</a></td>
                                <td>".$rw['date']."</td>";
                                ?>
                                </tr>
                                <?php
                            }
                        }
                        
                      else{

                            echo "<script type=\"text/javascript\">
                            alert(\"Nothig to show...\");
                            </script>";
                        }

                    }?>
                    </table>
                    <?php
                    if(isset($_POST['ashop']))
                    {
                    
                        include("available_shop.php");
                    }
                    if(isset($_POST['send']))
                    {
                        header("Location:upload.php");
                        
                    }
                    if(isset($_POST['reqaccept']))
                    {
                      
                        ?>
                      <h1 style="margin-left:40%;color:#fff;margin-top:1%;">REQUEST ACCEPTED</h1>
                        <?php
                        $sql="SELECT send_to FROM send_request where sender_email='$_SESSION[email]'&& status=1";
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $_SESSION['e']=$row["send_to"];
                            }
                        
                        $s1="SELECT shopname,shopaddress FROM shopuser_register WHERE email='$_SESSION[e]'";
                        $res=mysqli_query($con,$s1);
                        if(mysqli_num_rows($res)>0){ ?>
                            <table>
                            <tr>
                            <th>Shop Name</th>
                            <th>Upload File</th>
                            </tr>
                            <?php
                        while($row1=mysqli_fetch_assoc($res))
                        {
                          
                         echo "
                            <tr>  
                           <td >".$row1['shopname']."  ,  " .$row1['shopaddress']."</td>";?>
                           <form action="file.php" method="post" enctype="multipart/form-data"><td id="file"> <a href="#"> 
                            <input type='file' name="myfile"  class='upload_file' id='ufile'></a>
                            <button name='upload' id='upload' onclick='upload()'>Proceed for check out</button>
                        </td>
                        </form>
                           </tr>
                          <!-- <script>
                                if (window.addEventListener)
                                window.addEventListener("load", upload, false);
                               function upload()
                               {
                               document.getElementById('upload').style.display='none';
                               document.getElementById('ufile').style.display='none';
                               let td= document.getElementById('file');
                               let text=document.createTextNode("File Uploded");
                               td.appendChild(text);
                               }
                               </script>-->
                           <?php
                        }
                        ?>
                            </table>
                            <?php
                    }
                }
                else{
                    echo "<script type=\"text/javascript\">
                    alert(\"Nothig to show...\");
                    </script>";
                }
               
                    }
                ?>
     
        </div>
    </div>
    </body>
</html>




    