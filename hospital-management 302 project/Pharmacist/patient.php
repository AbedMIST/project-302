<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Total Patient</title>
</head>
<body>
<?Php
$con = oci_connect("abed", "abed201914011", "localhost/XE");

include("../include/header.php");
?>
<div class="container-fulid">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-10">
            
                
                <?php


                 include("navber.php");
                ?>

             
                <div class ="col-md-10">
                <h5 class="text-center">Total patient</h5>
                <?php

                                $query="SELECT *from patient ";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>Email</th>
    <th>Action</th>
    

    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO patient.</td>
    </tr>
    
    
    
    ";
}




oci_execute($stid);
while($row = oci_fetch_row($stid))
{
   
   

    $output .= "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
   
    <td>
    <a href='prescription.php?id=".$row[0]."'>
          <button  id=".$row[0]." class='btn btn-info'>Prescription</button>
      </a>
      </td>";
}

$output .="
</tr>
</table>
";
echo $output;
?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>