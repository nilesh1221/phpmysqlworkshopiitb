<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
</head>
<body>
	<h1>Upload a file</h1>
	<form action="q3_file_upload.php " method="post" enctype="multipart/form-data">
		<input type="file" name="file"><br>
		<br>
		<button type="submit" name="submit">Submit</button>
	</form>
</body>
</html>

<?php
$name=$_FILES["file"]["name"];
$type=$_FILES["file"]["type"];
$size=$_FILES["file"]["size"];
$folder=$_FILES["file"]["tmp_name"];
echo "Filename: ".$name."<br>";
echo "Filetype: ".$type."<br>";
echo "Filesize: ".$size."<br>";
echo "Location: ".$folder;
?>