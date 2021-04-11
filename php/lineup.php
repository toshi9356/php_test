<?php
	$db = mysqli_connect("localhost", "root", "", "car");
	$carinfoSql = "select * from carinfo where pickup=0";
	$carinfoResult = mysqli_query($db, $carinfoSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>carlist.lineup</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="top1">
			<p id="top2">CARLIST</p>
			<p id="top3">駆け抜ける歓び</p>
			<ul id="nav1">
				<li><a href="http://localhost/test/php/index.php">新規登録・ログイン</a></li>
			</ul>
		</div>
		<ul id="nav2">
			<a href="top.php"><li>TOP</li></a>
			<a href="kodawari.php"><li>こだわり</li></a>
			<a href="lineup.php"><li>ラインナップ</li></a>
			<a href="mentenansu.php"><li>メンテナンス</li></a>
		</ul>
		<h1 id="top4">Line up</h1>
		<?php
			while($data = mysqli_fetch_assoc($carinfoResult)) {
				echo '<div class="lineup1">';
					echo '<p>'.$data["vehicle"].'</p>';
				echo '</div>';
				echo '<div class="lineup2">';
					echo '<img src="'.$data["filepass"].'">';
				echo '</div>';
			}
		?>
		<div id="footer">carlist japan.</div>
	</body>
</html>