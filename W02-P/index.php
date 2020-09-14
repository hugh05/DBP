<?php
  $link = mysqli_connect('localhost:3307', 'root', 'hy0512', 'dbp');
  $query = "SELECT * FROM recipe";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['ID']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => '자취생 간단 레시피',
    'description' => '원하시는 레시피를 선택하세요.'
  );

  if( isset($_GET['id'])){
  $query = "SELECT * FROM recipe WHERE ID = {$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
 }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 자취생 간단 레시피 </title>
</head>
<body>
  <h1> <a href="index.php"> 자취생 간단 레시피 </a></h1>
  <a href="create.php"> 특별 레시피 전수하기 </a>
  <ol><?= $list ?></ol>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
</body>
</html>
