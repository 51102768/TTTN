<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$value1 = $value2 = $value3 = $result = $error = "";
	if(isset($_POST['cal'])){

		$value1 = $_POST['value1'];
		$value2 = $_POST['value2'];
		$value3 = $_POST['value3'];
		if(is_numeric($value1) && is_numeric($value2) && is_numeric($value3)){
			$result =  $value1 + $value2 * $value3;
		}
		else{
			$error = "Loi du lieu";
		}
	}
?>
<h1>Phép tính</h1>
<p><?php echo $error?></p>
<form method="post" action=""> 
	<input type="text" name = "value1" value = "<?php echo $value1; ?>"> + 
	<input type="text" name = "value2" value = "<?php echo $value2; ?>"> * 
	<input type="text" name = "value3" value = "<?php echo $value3;	 ?>">
	<input type="submit" name = "cal" value="=">
	<input type="text" name = "result" value = "
		<?php
			echo $result;
		?>
	">
	<input type="reset" value="Nhap lai">
</form>
</body>
</html>