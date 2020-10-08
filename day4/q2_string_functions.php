<!DOCTYPE html>
<html>
<head>
	<title>Strings</title>
</head>
<body>
	<form action="q2_string_functions.php" method="post">
		<label for="string">Enter any string: </label>
		<input type="text" name="string"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>
<?php
if(isset($_POST["submit"])){
	$string = $_POST["string"];
	echo strlen($string),"<br>";
	$new=explode(" ",$strng);
	$name1=implode($new);
	echo $name1. "<br>";
	echo strrev("$string")."<br>";
	echo mb_strtolower($string)."<br>";
	echo mb_strtoupper($string)."<br>";
	$substring="Nothing";
	echo "Before replacing Substring= ".$substring."<br>";
	$res=substr_replace($substring, $string,0,strlen($substring));
	echo "After replacing Substring= ".$res."<br>";

}
?>
