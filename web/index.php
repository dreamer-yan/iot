<!DOCHTML HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="favicon.ico">
	<title>iot v0.0.2</title>
</head>
<body>
	<center>
		<h1>
			<a href="index.php" style="height:50px;width:200px;" >主页</a>
			<form action="" method="post" >
				取值范围：0~100<br />
				R: <input type="text" name="R" /><br />
				G: <input type="text" name="G" /><br />
				B: <input type="text" name="B" /><br /><br />
				<input type="submit" value="提交" style="height:50px;width:200px;">
			</form>
		</h1>
	</center>
	<?php
		if(($_POST['R'] >= "0" && $_POST['R'] <= "100") && ($_POST['G'] >= "0" && $_POST['G'] <= "100") && ($_POST['B'] >= "0" && $_POST['B'] <= "100"))
		{
			$R = htmlspecialchars($_POST['R']);
			$G = htmlspecialchars($_POST['G']);
			$B = htmlspecialchars($_POST['B']);
			$json_string = file_get_contents("api.json");
			$data = json_decode($json_string,true);
			$data["R"] = $R;
			$data["G"] = $G;
			$data["B"] = $B;
			$json_strings = json_encode($data);
			file_put_contents("api.json",$json_strings);
		}
		elseif($_POST['R'] == NULL || $_POST['G'] == NULL || $_POST['B'] == NULL)
		{
			echo "<center><h1>Please input.</h1></center>";
		}
		elseif($_POST['R'] < "0" || $_POST['R'] > "100" || $_POST['G'] < "0" || $_POST['G'] > "100" || $_POST['B'] < "0" || $_POST['B'] > "100")
		{
			echo "<center><h1>Please input number!!</h1></center>";
		}
	?>
	<center><h1>当前值为：R = <?php echo isset($data["R"]) ? $data["R"] : '---' ?> G = <?php echo isset($data["G"]) ? $data["G"] : '---' ?> B = <?php echo isset($data["B"]) ? $data["B"] : '---' ?></h1></center>
</body>
</html>