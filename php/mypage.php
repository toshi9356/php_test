<?php
	$email = $_POST["email"];
	$password = $_POST["password"];
	$authority = $_POST["authority"];
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "select * from login where email = '".$email."' and password = '".$password."' and authority = '".$authority."'";
	$loginResult = mysqli_query($db, $loginSql);
	$loginFlug = false;
	$name = "";
	while($data = mysqli_fetch_assoc($loginResult)) {
		$name = $data['name'];
		$id = $data['id'];
		$loginFlug = true;
	}
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>マイページ</title>
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
	<?php
		if ($loginFlug) {
			echo '<p class="name">'.$name.'様、ログインできました。</p><br/>
				<p class="login">他のユーザー検索</p>
				<form class="form" action="search.php" method="post">
					<label for="gender">性別</label>
					<input class="gender" type="radio" name="gender" value="0" checked=checked>男
					<input class="gender" type="radio" name="gender" value="1">女
					<input class="gender" type="checkbox" name="over_sixty" value="1">60歳以上も含む<br>
					<input type="hidden" name="id" value="'.$id.'">
					<input class="submit" type="submit" value="検索">
				</form>';
		} else {
			echo '<p class="login">ユーザー名またはPasswordが正しくありません。</p>
				<form class="form" action="index.php" method="post">
					<input class="submit" type="submit" value="戻る">
				</form>';
		}
	?>
		<div id="footer">carlist japan.</div>
	</body>
</html>
