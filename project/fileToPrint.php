<?php
include "connect_db.php";

?>
<html>
    <hed>
        <style>
            table{
    margin:2%;
    margin-left:5%;
    font-size:16px;
    border:1px solid black;
}

td{
    background-color:#E4F5D4;
    border:1px solid black;
    font-weight:lighter;
    border :1px solid black;
    padding:4px;
    text-align:center;
  
}

th{
    font-weight:bold;
    border :1px solid black;
    padding:2px;
    text-align:center;
    color:#006600;
    background-color:#e4f5d4;
}
.status_a{
   width:100%;
    height:100%;
    background:rgb(10, 137, 105);
    margin-right:7%;
    cursor: pointer;
    font-size:17px;
    text-decoration:none;
    color:#fff;
}

.status_a:hover
{
    background:rgb(26, 184, 216);
}

.status_r{
    width:40%;
    height:100%;
    background:rgb(217, 46, 46);
    cursor: pointer;
    font-size:17px;
    text-decoration:none;
    color:#fff;
    margin-top:3px;
}
.status_r:hover{
    background:rgb(26, 184, 216);
}

</style>
</head>
<body>
    <?php
            
$sql="SELECT sno,send_from,fname FROM uploaded_files where send_to='$_SESSION[semail]'";

$result=mysqli_query($con,$sql);
           
            if(mysqli_num_rows($result)>0){ ?>
            <h1 style="margin-left:40%;color:#fff;margin-top:1%;">FILES TO PRINT</h1>
                <table>
                <tr>
                <th>Sender Email</th>
                <th>File</th>
                </tr>
            
                <?php
            while($row=mysqli_fetch_assoc($result))
            {
              $sno=$row["sno"]; 
              $file=$row['fname'];
              $sfrom=$row['send_from'];
                echo "
                <tr>  
               <td>".$row['send_from']."</td> ";
               echo" <td><a href='download.php?sno=$sno' >".$file."</a></td>";
              
    }
}    
      
        ?>
        </tr>
        </table>   
       </body>
       </html>