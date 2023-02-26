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

   
    $email=validate($_POST['email']);
    $password=validate($_POST['password']);
    
    if(empty($email)){
        echo "<script type=\"text/javascript\">
        alert(\"User Email is Require\");
        window.location='home.html';
        </script>";
     
exit();
}
else if(empty($password))
{

echo "<script type=\"text/javascript\">
alert(\"Password is Require\");
window.location='home.html';
</script>";

exit();
}
else{
    $sql="SELECT * FROM user_register WHERE email='$email' AND password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if($row['email']===$email && $row['password']===$password){
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
            $_SESSION['name']=$row['name'];
            echo "<script type=\"text/javascript\">
             alert(\"Login Sucessfully!\");
             window.location='userpage.php';
             </script>";
         
            exit();
        }
    }
    else{
     echo "<script type=\"text/javascript\">
     alert(\"Invalid email or password!\");
     window.location='home.html';
     </script>";
       
        exit();
    }
}
}

mysqli_close($con);

?>