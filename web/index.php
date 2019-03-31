<!DOCHTML HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="favicon.ico">
	<title>iot v0.0.1</title>
	<style>
		.button_red {display: inline-block;padding: 100px 200px;font-size: 24px;cursor: pointer;text-align: center;   text-decoration: none;outline: none;color: #000;background-color: #FF0000;border: none;border-radius: 15px;box-shadow: 0 9px #999;}.button_red:hover {background-color: #FF4500}.button_red:active {background-color: #FF4500;box-shadow: 0 5px #666;transform: translateY(4px);}.button_yellow {display: inline-block;padding: 100px 200px;font-size: 24px;cursor: pointer;text-align: center;   text-decoration: none;outline: none;color: #000;background-color: #FFFF00;border: none;border-radius: 15px;box-shadow: 0 9px #999;}.button_yellow:hover {background-color: #FFFF00}.button_yellow:active {background-color: #FFFF00;box-shadow: 0 5px #666;transform: translateY(4px);}.button_green {display: inline-block;padding: 100px 200px;font-size: 24px;cursor: pointer;text-align: center;   text-decoration: none;outline: none;color: #000;background-color: #008000;border: none;border-radius: 15px;box-shadow: 0 9px #999;}.button_green:hover {background-color: #3e8e41}.button_green:active {background-color: #3e8e41;box-shadow: 0 5px #666;transform: translateY(4px);}
	</style>
</head>
<body>
	<center><a href="?colour=red" class="button_red">红色</a></center>
	<center><a href="?colour=yellow" class="button_yellow">黄色</a></center>
	<center><a href="?colour=green" class="button_green">绿色</a></center>
	
	<?php
		$colour = isset($_GET['colour'])? htmlspecialchars($_GET['colour']) : '';
		$json_string = file_get_contents("api.json");
		$data = json_decode($json_string,true);
		
		if($colour == 'red') {
			$data["led"] = "red";
        } else if($colour == 'yellow') {
			$data["led"] = "yellow";
        } else if($colour == 'green') {
			$data["led"] = "green";
        }
		
		$json_strings = json_encode($data);
		file_put_contents("api.json",$json_strings);
	?>
	
	<center><h1>当前的颜色为：<?php echo $data["led"]; ?></h1></center>
</body>
</html>