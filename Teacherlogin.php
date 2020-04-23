<?php
	include('./dbcon.php');
	$useruid = $_POST['userid'];
	$userpas = $_POST['password'];
	$res = mysqli_query($connection,"insert into teacher(userid, password) values ('$useruid', '$userpas')");
	if($res){
		exit(json_encode(array('status'=>'ok','msg'=>'user_created')));
	}
	else{
		exit(json_encode(array('status'=>'error','msg'=>'user_not_created')));
	}
?>