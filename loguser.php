<?php
session_start();
if (strpos($_SERVER['HTTP_REFERER'], 'login.php') === false) {
   header("Location: error.php");
die();
}
// post data

$user="";
$password="";


if(!empty($_POST)){

	$password 	=	$_POST["password"];
	$user		=	$_POST["user"];
}

	

$data = file_get_contents('data/users.json');
$data = str_replace("var users =", "",$data);

$json_arr = json_decode($data, true);


foreach ($json_arr as $key => $value) {

    if ($value['username'] == $user && $value['password'] == $password) {
		
		
		$_SESSION["user"]=$user;
		echo 	"success";
    }


}

?>