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

$sql="SELECT req_no,total_pages,print_colour,page_type,page_format,no_of_copies,sender_email FROM send_request WHERE send_to='$_SESSION[semail]' ";
           
$result=mysqli_query($con,$sql);
           
            if(mysqli_num_rows($result)>0){ ?>
        <h1 style="margin-left:40%;color:#fff;margin-top:1%;">REQUESTS</h1>
                <table>
                <tr>
                <th>Sender Email</th>
                <th>Total Pages</th>
                <th>Print Colour</th>
                <th>Page Type</th>
                <th>Page Format</th>
                <th>Number Of Copies</th>
                <th>Status</th>
                
                <?php
            while($row=mysqli_fetch_assoc($result))
            {
              $id=$row["req_no"]; 
             echo "
                <tr>  
               <td>".$row['sender_email']."</td>
               <td>".$row['total_pages']."</td>
               <td>".$row['print_colour']."</td>
               <td>".$row['page_type']."</td>  
               <td>".$row['page_format']."</td>
               <td>".$row['no_of_copies']."</td>
               <td id='status'>
               <a href='update_status_accept.php?id=$id'   class='status_a' id='accept' onclick='show()' >Accept</a> 
               <a  href='update_status_delete.php?id=$id'  class='status_r' id='delete'>Reject</a>
               </td>";
    
            }
        
    
            ?>
                 <!-- <script>
                 
                 if (window.addEventListener)
                  window.addEventListener("load", show, false);
                 function show(){
                     document.getElementById('delete').style.display='none';
                     document.getElementById('accept').style.display='none';
                    let td= document.getElementById('status');
                     let data= document.createTextNode("Accept");
                     td.appendChild(data);
                   document.getElementById('status').style.paddingBottom = "3%";
                 }
                
          </script>-->

        </tr>
        </table>   
      <?php
            }
            ?>
       </body>
       </html>