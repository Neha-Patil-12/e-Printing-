<?php
$dbanme="project";
$servername="localhost:2224";
$username="root";
$password="";

$con= mysqli_connect($servername,$username,$password,$dbanme);
if(!$con)
{
    die("Connection Error.".mysqli_connect_error($con));
}
?>