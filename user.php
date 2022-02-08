<?php 

include_once ('app/function.php');

$delete_id = $_GET['delete_id'] ?? false;


if ($delete_id) {
	connect() -> query("DELETE  FROM  users WHERE id ='$delete_id'");
	header('location:user.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
	<a class="btn btn-primary" href="index.php"> add  student </a>
	 <br>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
							
							$data = connect() -> query("SELECT * FROM users");

							while($user = $data -> fetch_object()) : 
							
							 $sn = 1;
							?>
						<tr>

							<td><?php $sn; $sn++ ?></td>
							<td><?php echo $user -> name;?></td>
							<td><?php echo $user -> email; ?></td>
							<td><?php echo $user -> cell; ?></td>
							<td><?php echo $user -> uname; ?></td>
							<td><img style="height: 40px; width: 50px; object-fit: cover;" src="photos/<?php echo $user -> photo; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="singel.php?user_id=<?php echo $user -> id; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edite.php?edite_id=<?php echo $user -> id; ?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $user -> id; ?>">Delete</a>
							</td>

							<?php 
							
							endwhile;
							?>


						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<script>

    $('.btn-danger').click(function(){

		 let delet = confirm('are you sure');
		  if (delet) {
			  return true;
		  }else{
			  return false;
		  }

	})
   

	</script>


</body>
</html>