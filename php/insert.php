<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新規登録</title>
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
		<p class="login">会員情報を入力して下さい</p>
		<form class="form" action = "signup.php" method = "post">
			<label for="email">Email</label><br>
			<input type="text" id="email" name="email" required><br>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" required><br>
			<label for="phonenumber">電話番号</label><br>
			<input type="text" id="phonenumber" name="phonenumber" required><br>
			<label for="name">名前</label><br>
			<input type="text" id="name" name="name" required><br>
			<label for="gender">性別</label><br>
				<input class="gender" type="radio" name="gender" value="0" checked=checked>男
				<input class="gender" type="radio" name="gender" value="1">女<br>
			<label for="old">年齢</label><br>
			<?php
			echo '<select id="old" name="old" required><br>';
			for($i=1; $i<=100; $i++) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			echo '</select><br>';
			?>
			<label for="birth">生年月日</label><br>
			<input type="text" id="birth" name="birth" required><br>
			<input class="submit" type="submit" value="登録">
		</form>
		<div id="footer">carlist japan.</div>
	</body>
</html>