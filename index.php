<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>掲示板</title>

	<link rel="stylesheet" href="css/common.css">



</head>
<body>

<h1>家族伝言板</h1>
<br>




<h2>新規投稿</h2>

	<form action="index.php" method="post">
		<p>名前</p>
		<select name="a">
		<option class=opsize value="じい">じい</option>
		<option class=opsize value="ばあ">ばあ</option>
		<option class=opsize value="パパ">パパ</option>
		<option class=opsize value="ママ">ママ</option>
		<option class=opsize value="ベイビー">ベイビー</option>
</select>

		<p>コメント</p>
		<textarea class=txsize name="b"></textarea>
				<br>
		<br>
		<br>
		<input type="submit" value="送信">



	</form>



<h2>投稿一覧</h2>
<div class = "box">
<?php


if (! empty($_POST["a"]) && ! empty($_POST["b"])) {
    $a = htmlspecialchars($_POST["a"], ENT_QUOTES);
    $b = htmlspecialchars($_POST["b"], ENT_QUOTES);

    $db = new PDO("mysql:host=127.0.0.1;dbname=BBS;charset=utf8", "root", "");



    $db->query("INSERT INTO tb1(no,name,message,time)
VALUES(NULL,'$a','$b',NOW())");

    print "<h1>コメント送信完了しました</h1>";

}


$db = new PDO("mysql:host=127.0.0.1;dbname=BBS;charset=utf8", "root", "");



$n = $db->query("SELECT * FROM tb1 ORDER BY no DESC");
while ($i = $n -> fetch()) {
    print "{$i['no']}:{$i['name']}<br>{$i['time']}<br><br>" . nl2br($i['message']) .  "<hr>";
}

?>

</div>

</body>


</html>