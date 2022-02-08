

<?php


include_once('app/function.php');

$users = $_GET['user_id'] ?? false;
if ($users) {
    $data = connect()->query("SELECT * FROM users WHERE id='$users'");

    $user_data = $data -> fetch_object();
    if ($user_data -> name == '') {
      header('location:user.php');
    }
}else {
  header('location:user.php');
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5</title>

	<!-- ALL CSS FILES  -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
</head>




<style>
    .single-user{
  width: 500px;
  margin: 200px auto ;
  text-align: center;
  border-radius: 30px;
  padding-bottom: 10px;
  padding-top: 10px;
  
  
}
.single-user img{
    
width: 200px;
height: 200px;
object-fit: cover;
border-radius: 100%;

}

</style>

<body>
 
<div class="single-user  bg-primary  text-light">

<img src="photos/<?php echo  $user_data -> photo ;?>" alt="">
<h2><?php echo  $user_data -> name ;?></h2>

<h3><?php echo  $user_data -> cell ;?></h3>
<a class="btn btn-info" href="user.php"> back</a>






</div>



	<!-- JS FILES  -->

	<script src="assets/js/custom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>