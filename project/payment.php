<?php
session_start();
include "connect_DB.php";
/*$sql2="SELECT shopname,shopaddress from shopuser_register where email='$_SESSION[send_to]' ";
$res2=mysqli_query($con,$sql2);
if(mysqli_num_rows($res2))
{ 
    while($r2=mysqli_fetch_array($res2)){
        $s_name= $r2['shopname'];
        $s_add= $r2['shopaddress'];
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">

</head>
<body>

<div class="container">

    <form action="pay_details.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="name" placeholder="john deo" required> 
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" placeholder="example@example.com" required>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="add" placeholder="room - street - locality" required>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" placeholder="mumbai" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="india" required>
                    </div>
                    <div class="inputBox">
                        <span>Amount to pay :</span>
                        <input   name="rs" value=" <?php echo $_SESSION['Total']; ?>" required></input>
                    </div></div>
                    <div class="inputBox">
                        <span>Paying Amount To :</span>
                        <input type="text"  name="pay_to" value=" <?php echo $_SESSION['s_name'].", ".$_SESSION['s_add']; ?>" required></input>
                    </div>
                </div>

            

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="c_name" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="c_no" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" name="exp_m" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" name="exp_y" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" name="pay" value="PAY AMOUNT" class="submit-btn">

    </form>

</div>    
    
</body>
</html>