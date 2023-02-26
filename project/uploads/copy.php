<?php
            $sql="SELECT shopimage,shopname,shopaddress FROM register";
            $result=mysqli_query($con,$sql);
            $i=0;
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result))
            {?>

                <div class="shop">
                    <div class="simg">
                        <p>hii</p>
                    <?php echo $row["shopimage"];?>
                    </div>
                    <div class="sdetail">
                        <p>hello</p>
                    <?php echo $row["shopname"]." , ". $row["shopaddress"];?>
                    
                    </div>
           <?php
        $i++;   
        }
        }
        else{
            echo"No data found..";
        }
        ?>
        
        </div>

        style="padding-top:2%; display:flex;flex-direction:row-reverse; columngap:20px;order:3;flex-wrap:wrap;justify-content:space-evenly;align-item:flex-start;"

        //click='sendAction(1,"<?php echo isset($_POST["shop"]) ?>")'

        <?php// if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <td><input type='file' name='file' accept='.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*' class='upload_file' multiple ></td>