
<?php  include('connect_db.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id=$_GET['id'];
        $que1="UPDATE send_request set status=1 where req_no=$id";
        $res=mysqli_query($con,$que1);
        header("location:shopuser_page.php");
    ?>
</body>
</html>