<?php
include("sql.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT,GET,POST");
header("Access-Control-Allow-Headers:Origin,X-Requested-With,Content-Type,Accept");

$postdata=file_GET_contents("php://input");
$request=json_decode($postdata);
$name=mysqli_real_escape_string($con,trim($requst->data->name));
$pass=mysqli_real_escape_string($con,trim($requst->data->txtpass));
	$uname=mysqli_real_escape_string($con,trim($requst->data->uname));
$query="INSERT INTO `tbl_register`(`name`, `username`, `password`) VALUES ('$name','$uname','$pass')";
mysqli_query($con,$query);
if(mysqli_query($con,$query))
{
	


$student=['name'=>$name,'password'=>$pass,'id'=>mysqli_insert_id($con)];
echo json_encode(['data'==>$student]);
}


?>