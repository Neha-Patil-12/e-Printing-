
<?php  
include('connect_db.php'); 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php
        $id=$_GET['id'];
        $que1="DELETE FROM send_request where req_no=$id";
       //$que1="UPDATE send_request set status=-1 where req_no=$id";
        $res=mysqli_query($con,$que1);
        if($res==TRUE)
        {
            echo"<script type=\"text/javascript\">
            alert(\"Request Rejected.\");
            window.location='shopuser_page.php';
            </script>";
        }
        else{
            echo"<script type=\"text/javascript\">
            alert(\"Error.\");
            window.location='shopuser_page.php';
            </script>";
        }
        
    ?>
</body>
</html>