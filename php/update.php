<?php
	$id = $_POST["id"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phonenumber = $_POST["phonenumber"];
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$old = $_POST["old"];
	$birth = $_POST["birth"];
	$authority = $_POST["authority"];
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "update login set
	email='".$email."', password='".$password."', phonenumber='".$phonenumber."',
	name='".$name."', gender='".$gender."', old=".$old.", birth='".$birth."'
	where id=".$id;
	$loginResult = mysqli_query($db, $loginSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>更新完了</title>
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
		<p class="login">更新完了しました</p>
		<?php
			if ($authority == 1 ) {
				echo '<form class="return" action="mypage.php" method="post">';
					echo '<input type="hidden" name="email" value="'.$email.'">';
					echo '<input type="hidden" name="password" value="'.$password.'">';
					echo '<input type="hidden" name="authority" value="'.$authority.'">';
					echo '<input class="submit" type="submit" value="マイページへ">';
				echo '</form>';
			}
		?>
		<form class="return" action="index.php" method="post">
			<input class="submit" type="submit" value="ログインページへ">
		</form>
		<div id="footer">carlist japan.</div>
	</body>
</html>