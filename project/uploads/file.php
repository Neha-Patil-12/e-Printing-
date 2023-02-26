
<?php
include 'connect_db.php';
session_start();

 if(isset($_POST['upload']))
 {
   
    $filename=$_FILES['myfile']['name'];
$destination='uploads/'.$filename;
$extension=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$file=$_FILES['myfile']['tmp_name'];
$size=$_FILES['myfile']['size'];

$query="CREATE table if not exists  uploaded_files(sno int AUTO_INCREMENT primary key,send_from varchar(20),send_to varchar(20),fname varchar(50),size double,date TIMESTAMP)";
if(!mysqli_query($con,$query))
{
echo "Error creating table:".mysqli_error($con); 
}

if(!in_array($extension,['zip','pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif','php','html','java','css']))
{
    echo "<script type=\"text/javascript\">
    alert(\"Your file extension must be .zip, .pdf, .docx ,.txt ,.png ,.jpg ,.jpeg\");
    window.location='userpage.php';
    </script>";

}
elseif($_FILES['myfile']['size']>1000000)
{
    echo "<script type=\"text/javascript\">
    alert(\"File too large!\");
    window.location='userpage.php';
    </script>";
}
else{
    //move the uploaded (temporary) file to the specified destination
    if(move_uploaded_file($file,$destination))
    {
        $sql="INSERT into uploaded_files(send_from,send_to,fname,size)VALUES('$_SESSION[email]','$_SESSION[e]','$filename','$size')";
        if (mysqli_query($con, $sql))
        {
            echo "<script type=\"text/javascript\">
            alert(\"File uploaded successfully\");
            window.location='checkout.php';
            </script>";
        } 
    }
    else{
        echo "<script type=\"text/javascript\">
            alert(\"Fail to upload file!! \");
            window.location='userpage.php';
            </script>";
    }
}
 }

?>