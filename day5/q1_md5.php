<?php
require 'connect.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>MD5 </title>
</head>
<body>
<form action="q1_md5.php" method="POST">
	<label>USERNAME: </label>
	<input type="text" name="username">
	<br><br>
	
	<label>PASSWORD : </label>
	<input type="text" name="pass">
	<br>
	<input type="submit" name="submit" value="Submit">
	<br>

<?php
	if (isset($_POST['submit'])) {
		$uname= $_POST['username'];
		$pass=md5($_POST['pass']);
		

	$result = mysqli_query($conn,"INSERT INTO `userdata`(`username`, `password`) VALUES ('$uname','$pass')");

	if($result){
	echo "<br>Success";
}	
else{
	echo "<br>Not Inserted";
}

	}
?>	

</form>
</body>
</html>
