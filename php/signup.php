<?php
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phonenumber = $_POST["phonenumber"];
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$old = $_POST["old"];
	$birth = $_POST["birth"];
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "insert into login
	(email, password, phonenumber, name, gender, old, birth) value
	('".$email."', '".$password."', '".$phonenumber."', '".$name."', '".$gender."', '".$old."', '".$birth."')";
	$loginResult = mysqli_query($db, $loginSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登録完了</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="top1">
			<p id="top2">CARLIST</p>
			<p id="top3">駆け抜ける歓び</p>
		</div>
		<ul id="nav2">
			<a href="top.php"><li>TOP</li></a>
			<a href="kodawari.php"><li>こだわり</li></a>
			<a href="lineup.php"><li>ラインナップ</li></a>
			<a href="mentenansu.php"><li>メンテナンス</li></a>
		</ul>
		<p class="login">登録完了しました</p>
		<div class="form">
			<div class="touroku">
				<a href="index.php">ログインページへ</a>
			</div>
		</div>
		<div id="footer">carlist japan.</div>
	</body>
</html>