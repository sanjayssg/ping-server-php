<?php

require "db.php";
session_start();
if(!isset($_SESSION['email'])){
echo "<script>window.open('login.php?not_admin=You are not Admin!','_self')</script>";
}
else{




?>

<html>

<head>
	<title>IP LIST</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="js/bootstrap.min.css" />
	<link rel="stylesheet" src="js/dataTables.bootstrap.min.css">
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script> 
	<link href="js/bootstrap.css" rel="stylesheet" />
	<link href="js/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	</script>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">

		<div class="container">
			
			<div class="table-responsive"><br><br>
			<a  href="add_iplist.php" class="btn btn-primary"> Add IP Server</a><br><br>
				<table id="inventory" class="table table-striped table-bordered">
					<thead>
						<tr>
							<td>Server Name</td>
							<td>Location</td>
							<td>IP Address</td>
							<td>Edit</td>
							<td>Delete</td>


						</tr>

					</thead>
					<?php

					$query="select * from ip_list ";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result)){
	echo'
	<tr>
	<td>'.$row["server_name"].'</td>
	<td>'.$row["location"].'</td>
	<td>'.$row["ip_address"].'</td>
	<td><a href="edit.php?edit_id='.$row["id"].'" " class="btn btn-primary">Edit</a></td>
	<td><a href="delete.php?delete_id='.$row["id"].'" " class="btn btn-danger">Delete</a></td>
	
	</tr>
	  ';
}
?>

				</table>
			</div>
		</div>
	</form>
<script>
	$(document).ready(function () {
		$('#inventory').DataTable({
			"order" : [
				[0, 'desc']
			]
		});
	});
</script>
</body>

</html>
<?php } ?>