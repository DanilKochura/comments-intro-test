<?php 

	require 'model/comment.php';
	//print_r($_POST);
	$comm = new Comment();
	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	$email = strip_tags($_POST['email']);
	$res = $comm->create($name, $phone, $email, $_POST['rate']);
	echo $res;

?>