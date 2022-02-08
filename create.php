<?php
if (strpos($_SERVER['HTTP_REFERER'], 'add.php') === false) {
   header("Location: error.php");
die();
}
$platenumber="";
$covers="";
$location="";
$link="";
$phone="";
$phone1="";
$phone2="";

if(!empty($_POST)){

	$password 	=	$_POST["password"];
	$insid		=	$_POST["insid"];
	$name 		=	$_POST["name"];
	$phone1		=	$_POST["phone1"];	
	$phone2		=	$_POST["phone2"];
	$phone		=	$_POST["phone"];
	$car		=	$_POST["car"];
	$health		=	$_POST["health"];
	$property	=	$_POST["property"];
	$travel		=	$_POST["travel"];
	$type		=	$_POST["type"];
	$link		=	$_POST["link"];
	$location	=	$_POST["location"];
	$start		=	$_POST["start"];
	$end		=	$_POST["end"];
	
	if($type == "car"){
		$platenumber		=	$_POST["platenumber"];
	}
	if($type == "health"){
		$covers		=	$_POST["covers"];
	}
	if($type == "property"){
		$location		=	$_POST["location"];
	}
	}
	echo $password;echo"<br>";
	echo $insid;echo"<br>";
	echo $name;echo"<br>";
	echo $platenumber;echo"<br>";
	echo $phone1;echo"<br>";
	echo $phone2;echo"<br>";
	echo $phone;echo"<br>";
	echo $link;echo"<br>";
	echo $location;echo"<br>";
	echo $covers;echo"<br>";
	echo $start;echo"<br>";
	echo $end;echo"<br>";
	//die;
// read json file
/*
$filePath = __DIR__ . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . $password; //#new
if (!file_exists($filePath)) { if (!mkdir($filePath, 0777, true)) {
  verbose(0, "Failed to create $filePath");
}}
*/
$data = file_get_contents('data/data.json');
//$data = file_get_contents($filePath.'/data.json');
$data = str_replace("var data =", "",$data);
// decode json
$json_arr = json_decode($data, true);

// add data

$json_arr[] = array('password'=>$password,'id'=>$insid, 'type'=>$type, 'platenumber'=>$platenumber,'name'=>$name, 'phone'=>$phone,'phone1'=>$phone1,'phone2'=>$phone2,'link'=>$link,'location'=>$location, 'covers'=>$covers, 'start'=>$start, 'end'=>$end, "messages"=>"");

//print_r($json_arr);die; 
//$json_arr[] = array('Code'=>4, 'Name'=>'Jeff Darwin', 'Sports'=>'Cricket');
// encode json and save to file

file_put_contents('data/data.json', "var data = ".json_encode($json_arr));
//file_put_contents($filePath.'/data.json', "var data = ".json_encode($json_arr));
header("Location: admin.php");
?>