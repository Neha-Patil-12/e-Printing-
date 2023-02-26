 <?php

					    include("connect_db.php");
						if(isset($_SESSION["email"])) {
						$result = mysqli_query($con,"SELECT email FROM `user_register` WHERE `email`='".$_SESSION["email"]."' LIMIT 1");
						if(mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                         $_SESSION["logged"] = $row["email"];
						 
						 
                       }
			       }
				   
	
                     ?> 
