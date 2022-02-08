<?php 

include_once('config.php');

// data base connect function
function connect(){

  return new mysqli('localhost', 'root', '', 'cards');
}

// validate function


function validate(string $msg, string $type='danger'){

  return "<P class=\"alert alert-{$type} alert-dismissible\">{$msg}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></p>";
  
  }
   
  // email chak
  function emailcheck($email){

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       return false;
    }else {
        return true;
    }}
  // old function

  function old ($key){
       return  $_POST[$key] ?? false;
  }

  // cleare form data 

function formclear(){

  return $_POST = '';
}


// photoUpload
function photoUplod ($file_data, $path = '/'){

  $file_name = $file_data['name'];
  $file_tmp_name = $file_data['tmp_name'];


  move_uploaded_file( $file_tmp_name, $path.$file_name);


  return $file_name;


}



