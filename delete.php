<?php
 require "db.php";
             
 if(isset($_GET['delete_id'])){
	 $delete_id=$_GET['delete_id'];
	 
	 $delete_iplist="delete from ip_list where id='$delete_id'";
$run_delete=mysqli_query($connect,$delete_iplist);
if($run_delete){
echo"
<script>alert('Data deleted Succesfully')</script>
<script>window.open('ip_list.php','_self')</script>";

}
else{
echo"<script>alert('Data not deleted')</script>";
}
    
	
}



?>