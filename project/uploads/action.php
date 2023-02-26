<?php
session_start();
include("connect_db.php"); // connect to the database
  include("function.php");

  $sender= $_SESSION['logged']; 
  //$reciver=$_SESSION['sname'];       
  $sql="CREATE TABLE IF NOT EXISTS sendreq(sno int AUTO_INCREMENT PRIMARY KEY,choose_shop varchar(100),sender_email varchar(100));";
 if(!mysqli_query($con,$sql))
{
    echo "Error creating table:".mysqli_error($con); 
}   
   $i=0;
   $sql="SELECT choose_shop FROM send_request";
   $result=mysqli_query($con,$sql);
   $collnum=mysqli_num_fields($result);
   if(mysqli_num_rows($result)>0){
                           
  if($row=mysqli_fetch_array($result)){

  
  mysqli_query($con,"INSERT INTO sendreq(choose_shop,sender_email) VALUES('$row[choose_shop]','$sender') ");
  
}
} 
else{

  die(mysqli_error());
}


           echo "<script type=\"text/javascript\">
                alert(\"Request sent\");
                window.location='userpage.php';
            </script>";

 
  
                    
 

?>