<?php
	$id = $_POST["id"];
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "select * from login where id=".$id;
	$carinfoSql = "select * from carinfo where id=".$id;
	$loginResult = mysqli_query($db, $loginSql);
	$carinfoResult = mysqli_query($db, $carinfoSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>削除確認</title>
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
			while($data = mysqli_fetch_assoc($loginResult)) {
				echo '<p class="login">本当に削除しますか？</p>';
				echo '<form class="form" action="delete.php" method="post">';
					echo '<input type="hidden" name="id" value="'.$id.'">';
					echo '<input class="submit" type="submit" value="削除する">';
				echo '</form>';
			}
		?>
		<div id="footer">carlist japan.</div>
	</body>
</html>