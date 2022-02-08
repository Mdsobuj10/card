

<?php 

include_once('app/function.php');


$edite = $_GET['edite_id'];

if ($edite) {
   $data = connect() ->query("SELECT * FROM users WHERE id='$edite'");

   $all_data = $data -> fetch_object();

      if ($all_data -> name == '') {
        header('location:user.php');
      }
}else{

    header('location:user.php');
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title><?php echo  $all_data -> name;?></title>
   <!-- ALL CSS FILES  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
   

<?php 


if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$cell = $_POST['cell'];
$username = $_POST['username'] ?? false;
$edu = $_POST['edu'] ?? false;
$gender = $_POST['gender'] ?? false;



 // updated date and time
 $updated_time =date('Y-m-d H:i:s');


if (empty($name) || empty($email) || empty($cell) || empty($username) || empty($edu) || empty($gender)) {
  $msg = validate('all fills are requreid', 'danger');
}elseif(emailcheck($email)){
       
        $msg = validate('invalided emaill adress', 'warning');
}else {

//    $file_name = photoUplod($_FILES['photo'], 'photos/');

   $updated_photo='';

if (!empty($_FILES['new_photo']['name'])) {
    $updated_photo =$file_name = photoUplod($_FILES['new_photo'], 'photos/');
}else{
    if (isset($all_data -> photo)) {
        $updated_photo = $all_data -> photo;
    }
   
}

   
     connect() ->query("UPDATE users SET name='$name', email='$email', cell='$cell', uname='$username', education='$edu', gender='$gender', photo='$updated_photo', update_at='$updated_time' WHERE id='$edite' ");


      $msg = validate('data updated', 'info');
      $data = connect() ->query("SELECT * FROM users WHERE id='$edite'");

      $all_data = $data -> fetch_object();
   
      
}
   
}




?>
   

   <div class="wrap shadow shadow-lg">

    <a class="btn btn-primary" href="user.php">all student</a>
    <br>
    <br>

       <div class="card">
           <div class="card-body">
               <h2>Sign Up</h2>
               <?php echo  $msg ?? '' ;?>
               <form action="" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="name">Name</label>
                       <input name="name" class="form-control"  type="text" value="<?php echo  $all_data -> name ;?>"  id="name">
                   </div>
                   <div class="form-group">
                       <label for="email">Email</label>
                       <input name="email" class="form-control" type="text" value="<?php echo  $all_data -> email ;?>"  id="email">
                   </div>
                   <div class="form-group">
                       <label for="cell">Cell</label>
                       <input name="cell" class="form-control" type="text" value="<?php echo  $all_data -> cell ;?>"  id="cell">
                   </div>
                   <div class="form-group">
                       <label for="ussername">Username</label>
                       <input name="username" class="form-control" type="text" value="<?php echo  $all_data -> uname ;?>"  id="username">
                   </div>
                   <div class="form-group">
                       <label for="education">education</label>
                       <select name="edu" class="form-control"  id="education">
                           <option  value=""> select</option>
                           <option <?php if ( $all_data -> education == 'psc') {
                                 echo 'selected';
                           }else{
                               echo '';
                           } ?> value="psc">psc</option> 
                           <option <?php if ($all_data -> education == 'jsc') {
                                 echo 'selected';
                           }else{
                               echo '';
                           } ?> value="jsc">jsc</option>
                           <option <?php if ($all_data -> education== 'ssc') {
                                 echo 'selected';
                           }else{
                               echo '';
                           } ?> value="ssc">ssc</option>
                           <option <?php if ( $all_data -> education == 'hsc') {
                                 echo 'selected';
                           }else{
                               echo '';
                           } ?> value="hsc">hsc</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="">gender</label>
                       <br>
                       <input name="gender" <?php if ($all_data -> gender == 'male') {
                                 echo 'checked';
                           }else{
                               echo '';
                           } ?> type="radio" id="male" value="male"> <label for="male">male</label>
                       <input name="gender" <?php if ($all_data -> gender == 'female') {
                                 echo 'checked';
                           }else{
                               echo '';
                           } ?> type="radio" value="female" id="female"> <label for="female">female</label>

                   </div>
                   <div class="form-group pb-2">
                       <img style="max-width: 100%;" src="photos/<?php echo  $all_data -> photo ; ?>" alt="">
                       
                       <input  name="new_photo" type="file">
                   </div>
               
                 <div class="form-group">
                       <input name="submit" class="btn btn-primary" type="submit" value="update data">
                   </div>
               </form>
           </div>
       </div>
   </div>
   



   <!-- JS FILES  -->

   <script src="assets/js/custom.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>