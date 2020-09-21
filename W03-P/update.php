<?php
$link = mysqli_connect('localhost:3307', 'root', 'hy0512', 'dbp');
$query = "SELECT * FROM topic";
$result = mysqli_query($link, $query);

$filtered_id = mysqli_real_escape_string($link, $_GET['id']);
$query = "SELECT * FROM recipe WHERE ID = {$filtered_id}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$article = array(
'title' => $row['title'],
'description' => $row['description']
);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 자취생 간단 레시피 </title>
</head>
<body>
  <h1> <a href="index.php"> 자취생 간단 레시피 </a></h1>
  <h2>당신의 특별 레시피를 전수해 주세요.</h2>
  <form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <p><input type="text" name="title" placeholder="title" value="<?= $article['title']?>"></p>
    <p><textarea name="description" placeholder="description"><?= $article['description']?></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>
