<?php
include "connect_DB.php";
session_start();
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['add'])&&isset($_POST['city'])&&isset($_POST['state'])&&isset($_POST['rs'])&&isset($_POST['pay_to'])&&isset($_POST['c_name'])&&isset($_POST['c_no'])&&isset($_POST['exp_m'])&&isset($_POST['exp_y'])&&isset($_POST['cvv'])&&isset($_POST['pay']))
{
   $name= $_POST['name'];
   $email=$_POST['email'];
   $add=$_POST['add'];
   $city=$_POST['city'];
   $state=$_POST['state'];
   $rs=$_POST['rs'];
   $pay_to=$_POST['pay_to'];
   $c_name=$_POST['c_name'];
   $c_no=$_POST['c_no'];
   $exp_m=$_POST['exp_m'];
   $exp_y=$_POST['exp_y'];
    $pay=$_POST['pay'];

$sql="CREATE table  if not exists pay_details (pno int primary key AUTO_INCREMENT ,name varchar(20),email varchar(50), address varchar(50),city varchar(30),state varchar(30),amount_pay int,pay_to varchar(100) ,name_on_card varchar(30))";

if(!mysqli_query($con,$sql))
{
    echo "Error creating table:".mysqli_error($con); 
}

$query="INSERT INTO pay_details (name ,email , address ,city ,state,amount_pay,pay_to ,name_on_card )VALUES('$name','$email','$add','$city','$state','$rs','$pay_to','$c_name')";
if (mysqli_query($con, $query)) {
    
    echo "<script type=\"text/javascript\">
    alert(\"Your Transaction Completed Sucessfully..\");
    window.location='userpage.php';
    </script>";
 
  } 
  else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);	
  }


}

?>