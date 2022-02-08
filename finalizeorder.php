<?php
error_reporting(0);
$data = $_POST['data'];
$total = $_POST['total'];
$user = $_POST['user'];
$t=time();
  // here i would like use foreach:
$file = "orders/".date("Y-m-d",$t).'_order_'.$user.'.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "\n".date("Y-m-d",$t)."-----------------------------\n".$data."\n total : ".$total;
// Write the contents back to the file
file_put_contents($file, $current);
echo $data;


?>