<?php  
include '../../conn.php';

if(isset($_POST["data_id"])){
	$data_id = $_POST["data_id"];
	$output = "";  
	$query = "SELECT * FROM users WHERE id = '$data_id' ";  
	$result = sqlsrv_query($conn, $query); 
	$output .= '
<div class="table-responsive">  
	<table class="table table-bordered">'; 
	$row = sqlsrv_fetch_array($result);
     $output .= '  
          <tr>  
               <td width="30%"><label>Name</label></td>  
               <td width="70%">'.$row["name"].'</td>  
          </tr>
          <tr>  
               <td width="30%"><label>Gender</label></td>  
               <td width="70%">'.$row["gender"].'</td>  
          </tr>  
          <tr>  
               <td width="30%"><label>Designation</label></td>  
               <td width="70%">'.$row["profession"].'</td>  
          </tr>
          ';    
$output .= "
	</table>
</div>";  
echo $output;  
}
 
?>