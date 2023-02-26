<?php
    include "connect_db.php";
?>
<html>
    <head>
        <style>

.row{
    background:rgba(0,0,0,0.65);
                height:93%;
                width: 100%;
                font-family:'Times New Roman', Times, serif ;
                outline: none;
                text-decoration: none;    
                position:absolute;
                margin-left:15%;  
              
}

h3{
    color:#ff4500;
    margin:2%;
    margin-left:20%;
   /* font-size:30px;*/
    text-decoration: underline;
}

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
    padding:2px;
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

    </style>
</head>
    <body>
        
<div class="row" >
<h3>AVAILABLE SHOPS </h3>
        <?php
            $sql="SELECT shopimage,shopname,shopaddress,cost_of_singleside,cost_of_bothside FROM shopuser_register";
            $result=mysqli_query($con,$sql);
            $i=0;
            if(mysqli_num_rows($result)>0){ ?>
                <table>
                <tr>
                <th>Shop Image</th>
                <th>Shop Name</th>
                <th>Shop Address</th>
                <th>Cost Of Black & White Print</th>
                <th>Cost Of Colour Print</th>
                </tr>
                <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
               <tr>
               <td> <img src=" <?php echo $row["shopimage"]; ?>" width="100" height="100"> </td>
            
                
               <td><?php echo $row["shopname"]; ?></td>
               <td> <?php echo  $row["shopaddress"];?></td>
               <td> <?php echo  $row["cost_of_singleside"]."Rs.";?></td>  
               <td> <?php echo   $row["cost_of_bothside"]."Rs.";?></td>
                </tr>
              
              
                <?php
            }
            ?>
            </table>
            </div>
            <?php
        }
        ?>
                        
                 </div>
            </body>
                    </html>