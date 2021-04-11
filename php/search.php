<?php
	$gender = $_POST["gender"];
	$db = mysqli_connect("localhost", "root", "", "car");
	$loginSql = "select * from login where gender = '".$gender."'";
	if (!isset($_POST["over_sixty"])) {
		$loginSql = $loginSql." and old<60";
	}
	$loginResult = mysqli_query($db, $loginSql);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>検索</title>
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
		<p class="login">他のユーザー情報</p>
		<table class="table" border="1">
			<tr class="login">
				<th>ID</th><th>名前</th><th>性別</th><th>年齢</th><th>生年月日</th><th>Email</th><th>電話番号</th>
			</tr>
			<?php
				while($data = mysqli_fetch_assoc($loginResult)) {
					echo '<tr>';
						echo '<td>'.$data["id"].'</td>';
						echo '<td>'.$data["name"].'</td>';
						if($data["gender"] == 0) {
							echo '<td>男</td>';
						} else {
							echo '<td>女</td>';
						}
						echo '<td>'.$data["old"].'</td>';
						echo '<td>'.$data["birth"].'</td>';
						echo '<td>'.$data["email"].'</td>';
						echo '<td>'.$data["phonenumber"].'</td>';
						echo '<td class="touroku"><a href="detail.php?id='.$data["id"].'">詳細はコチラ</a></td>';
					echo '</tr>';
				}
			?>
		</table>
		<?php
			$id = $_POST["id"];
			$db = mysqli_connect("localhost", "root", "", "car");
			$login1Sql = "select * from login where id = '".$id."'";
			$login1Result = mysqli_query($db, $login1Sql);
			mysqli_close($db);
			if($data = mysqli_fetch_assoc($login1Result)) {
			echo '<form class="sakuzyo" action="mypage.php" method="post">';
				echo '<input type="hidden" name="email" value="'.$data["email"].'">';
				echo '<input type="hidden" name="password" value="'.$data["password"].'">';
				echo '<input type="hidden" name="authority" value="'.$data["authority"].'">';
				echo '<input class="submit" type="submit" value="戻る">';
			echo '</form>';
			}
		?>
		<div id="footer">carlist japan.</div>
	</body>
</html>