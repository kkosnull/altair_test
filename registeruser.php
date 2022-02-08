<?php

// post data

$username="";
$password="";


if(!empty($_POST)){

$user 	=	htmlspecialchars($_POST["newuser"]);
$password	=	htmlspecialchars($_POST["newpassword"]);
	

$data = file_get_contents('data/users.json');
$data = str_replace("var users =", "",$data);
//echo $data;
//echo "<hr>";
// decode json to array
$json_arr = json_decode($data, true);


$json_arr[] = array('username'=>$user,'password'=>$password);


file_put_contents('data/users.json', "var users = ".json_encode($json_arr));
//header("Location: login.php");
//echo "success";
die();
}

?>