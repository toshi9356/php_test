<?php
	$id = $_GET["id"];
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
		<title>更新・削除</title>
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
				echo '<p class="login">ユーザー情報</p>';
				echo '<form class="form" action="update.php" method="post">';
					echo '<label for="email">Email</label><br/>';
					echo '<input type="text" id="email" name="email" value="'.$data["email"].'" required><br/>';
					echo '<label for="password">Password</label><br/>';
					echo '<input type="text" id="password" name="password" value="'.$data["password"].'" required><br/>';
					echo '<label for="phonenumber">電話番号</label><br/>';
					echo '<input type="text" id="phonenumber" name="phonenumber" value="'.$data["phonenumber"].'" required><br/>';
					echo '<label for="name">名前</label><br/>';
					echo '<input type="text" id="name" name="name" value="'.$data["name"].'" required><br/>';
					echo '<label for="gender">性別</label><br/>';
					if ($data["gender"] == 0) {
					echo '<input class="gender" type="radio" name="gender" value="0" checked=checked>男';
					echo '<input class="gender" type="radio" name="gender" value="1">女<br/>';
					} else {
					echo '<input class="gender" type="radio" name="gender" value="0">男';
					echo '<input class="gender" type="radio" name="gender" value="1" checked=checked>女<br/>';
					}
					echo '<label for="old">年齢</label><br/>';
					echo '<select id="old" name="old" required><br/>';
					for($data["old"]=1; $data["old"]<=100; $data["old"]++) {
						echo '<option value="'.$data["old"].'">',$data["old"],'</option>';
					}
					echo '</select><br/>';
					echo '<input type="hidden" name="id" value="'.$id.'">';
					echo '<label for="birth">生年月日</label><br/>';
					echo '<input type="text" id="birth" name="birth" value="'.$data["birth"].'" required><br/>';
					echo '<input type="hidden" name="authority" value="'.$data["authority"].'">';
					echo '<input class="submit" type="submit" value="更新">';
				echo '</form>';
				echo '<form class="sakuzyo" action="nextdelete.php" method="post">';
					echo '<input type="hidden" name="id" value="'.$id.'">';
					echo '<input class="submit" type="submit" value="削除">';
				echo '</form>';
				echo '<form class="sakuzyo" action="search.php" method="post">';
					echo '<input type="hidden" name="gender" value="'.$data["gender"].'">';
					echo '<input class="submit" type="submit" value="戻る">';
				echo '</form>';
			}
			while($data = mysqli_fetch_assoc($carinfoResult)) {
				echo '<p class="login">車両情報</p>';
				echo '<div class="form">';
					echo '<p style="background-color:gray;">現在のお車</p>';
						echo '<p>'.$data["vehicle"].'</p>';
					echo '<p style="background-color:gray;">登録年月</p>';
						echo '<p>'.$data["register"].'</p>';
					echo '<p style="background-color:gray;">次回車検日</p>';
						echo '<p>'.$data["inspection"].'</p>';
				echo '</div>';
				echo '<div class="lineup3">';
					echo '<img src="'.$data["filepass"].'">';
				echo '</div>';
			}
		?>
		<div id="footer">carlist japan.</div>
	</body>
</html>