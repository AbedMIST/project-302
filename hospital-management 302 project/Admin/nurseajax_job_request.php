<?php
session_start();
$con = oci_connect("abed", "abed201914011", "localhost/XE");
$query = "SELECT * FROM Nurse WHERE Nurse_status='Pending'";
$stid = oci_parse($con, $query);
oci_execute($stid);
$count=oci_fetch_all($stid, $results);

$output = "";

$output .="
<table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>Shift</th>
    <th>Working Age</th>
    <th>NID</th>
    <th>Certificate</th>
    <th>Action</th>
    </tr>
";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO JOB REQUEST YET.</td>
    </tr>
    
    
    
    ";
}




oci_execute($stid);
while($row = oci_fetch_row($stid))
{
   
   

    $output .= "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[5]."</td>
    <td>".$row[8]."</td>
    <td>".$row[10]."</td>
    <td>
    <a href='nurse-download.php?id=".$row[0]."'>
          <button  id=".$row[0]." class='btn btn-info'>Download</button>
      </a>
    </td>
    <td>
     <div class='col-md-1'>
         <div class='row'>
         <div class='col-md-6'>
         <button id='".$row[0]."' class='btn btn-success approve'>Approve</button>
         </div>
         <div class='col-md-6'>
         <button id='".$row[0]."' 
         class='btn btn-danger reject'>Reject</button>
         </div>
    </div>
    </div>
    </td>
      ";
}

$output .="
</tr>
</table>
";
echo $output;

?>