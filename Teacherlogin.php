<?php
	$useruid = $_POST['userid'];
	$userpas = $_POST['password'];
	$connection = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("mydba", $connection);
	$query = mysql_query("insert into teacher(email, password) values ('$useruid', '$userpas')");
	echo "Form Submitted Succesfully";
	mysql_close($connection);
?>