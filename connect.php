<?php
	$emailid = $_POST['emailid'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$ph_no = $_POST['ph_no'];
	// Database connection
	$conn = new mysqli('localhost','root','','waste');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user(emailid,uname,password,ph_no) values(?,?,?,?)");
		$stmt->bind_param("sssi", $emailid,$uname,$password,$ph_no);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>