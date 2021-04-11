<?php
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "select * from login";
	$loginResult = mysqli_query($db, $loginSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ログイン</title>
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
		<p class="login">ログイン</p>
		<form class="form" action = "mypage.php" method = "post">
			<label for = "email">Email</label><br>
			<input type = "text" id="email" name="email" required><br>
			<label for = "password">Password</label><br>
			<input type = "password" id="password" name="password" required><br>
			<input class="submit" type = "submit"><br>
			<div class="touroku">
				<a href = "insert.php">会員登録はコチラ</a><br>
			</div>
			<input type="hidden" name="authority" value="1">
		</form>
		<div id="footer">carlist japan.</div>
	</body>
</html>