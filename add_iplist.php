<?php

 
             
session_start();
if(!isset($_SESSION['email'])){
echo "<script>window.open('login.php?not_admin=You are not Admin!','_self')</script>";
}
else{
                
?>
<html>

<head>
    <title>Add IP Server</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="js/bootstrap.min.css" />
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" src="dataTables.bootstrap.min.css">
    </script>
</head>

<body>


    <div class="container">
        <div class="table-responsive">
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
               

                    
           
					<table id="inventory" class="table table-striped table-bordered">
                    
					<tr>
					<td>Servername</td>
					<td><input type="text" name="servername" placeholder="Enter Server Name"  /></td>
					</tr>
					
                    <tr>
                        <td>Location</td>
                        <td><input type="text" name="location" placeholder="Enter Location"/></td>
                    </tr>
                    <tr>
                        <td>IP Address</td>
                        <td><input type="text" name="ip_address" placeholder="Enter IP address"/></td>
                    </tr>
                   
				   <?php } ?>
                </table>
			
                    <input type="submit" name="add" value="Add Server" class="btn btn-primary">
					<a href="ip_list.php" class="btn btn-primary">IP List</a>
             
			
                

              
</body>

</html>


 <?php
 require "db.php";
			 if(isset($_POST['add'])){
				     $add_servername=$_POST['servername'];
                        $add_location=$_POST['location'];
						  $add_ipaddress=$_POST['ip_address'];
                       $name='sanjay';
                       
				  $add_record="INSERT INTO ip_list (server_name,location,ip_address,user)
									VALUES ('$add_servername','$add_location','$add_ipaddress','$name')
								  ";
                    $run=mysqli_query($connect,$add_record);
                 
  
			
				 if($run){
	echo"<script>alert('Data inserted Succesfully')</script>
	     <script>window.open('ip_list.php','_self')</script>
		";
	//echo"<script>window.open('index.php?view_products','_self')</script>";
}

else{
	echo"<script>alert('insertion error ')</script>";
}
			 }
			 
			 
			 
			 ?>


