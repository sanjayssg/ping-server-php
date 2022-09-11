<?php

                require "db.php";
               
                if(isset($_GET['edit_id'])){
                    $id=$_GET['edit_id'];
                    $get_asset_id="select * from ip_list where id='$id'";
                    $run_asset_id=mysqli_query($connect,$get_asset_id);
                    while($row_asset_id=mysqli_fetch_array($run_asset_id)){

                    
                        $servername=$row_asset_id['server_name'];
                        $location=$row_asset_id['location'];
                        $ip_address=$row_asset_id['ip_address'];
                       
                }
                
?>
<html>

<head>
    <title>Asset Inventory</title>
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
					<td><input type="text" name="servername" value="<?php echo $servername; ?>" /></td>
					</tr>
					
                    <tr>
                        <td>Location</td>
                        <td><input type="text" name="location" value="<?php echo $location; ?>"/></td>
                    </tr>
                    <tr>
                        <td>IP Address</td>
                        <td><input type="text" name="ip_address" value="<?php echo $ip_address; ?>"/></td>
                    </tr>
                   
				   <?php } ?>
                </table>
			
                    <input type="submit" name="update" value="Update Record" class="btn btn-primary">
					<a href="ip_list.php" class="btn btn-primary">IP List</a>
             
			
                

              
</body>

</html>


 <?php
			 if(isset($_POST['update'])){
				     $update_servername=$_POST['servername'];
                        $update_location=$_POST['location'];
						  $update_ipaddress=$_POST['ip_address'];
                       
                       
				  $update_record="update ip_list set 
								  server_name='$update_servername',
								  location='$update_location', 
								  ip_address='$update_ipaddress'
								  where id='$id'";
                    $run_update_record=mysqli_query($connect,$update_record);
			
				 if($run_update_record){
	echo"<script>alert('IP List has been updated Succesfully')</script>
	     <script>window.open('edit.php?edit_id=$id','_self')</script>
		";
	//echo"<script>window.open('index.php?view_products','_self')</script>";
}

else{
	echo"<script>alert('not updated ')</script>";
}
			 }
			 
			 
			 
			 ?>
