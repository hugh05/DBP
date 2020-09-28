<?php
  $link = mysqli_connect('localhost:3307', 'root', 'hy0512', 'dbp');
  $query = "SELECT * FROM recipe";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['ID']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => '자취생 간단 레시피',
    'description' => '원하시는 레시피를 선택하세요.'
  );
    $cook ='';
  $update_link='';
  $delete_link='';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      $query = "SELECT * FROM recipe LEFT JOIN cook ON recipe.cook_id = cook.id
    WHERE recipe.id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
    'title' => $row['title'],
    'description' => $row['description'],
    'name' => $row['name']
  );
      $cook = "<p>by {$article['name']}</p>";
      $update_link='<a href="update.php?id='.$_GET['id'].'">레시피 수정하기</a>';
      $delete_link='
      <form action="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="레시피 삭제하기">
      ';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 자취생 간단 레시피 </title>
  <style>
body {
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.textbox {
  padding: 10px;
  width: 50%;
  padding-bottom: 20%;
  border-radius: 20px 20px;
  background-color: #FFFFFF;
}
</style>
</head>
<body>
  <div class="textbox">
  <h1> <a href="index.php"> 자취생 간단 레시피 </a></h1>
  <a href="create.php"> * 특별 레시피 전수하기 </a>
  <br />
  <a href="cook.php">  * 요리사 등록 </a>
  <ol><?= $list ?></ol>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
  <?= $cook ?>
  <br /><br /><br />
  <div align="right">
  <?= $update_link?>
  <?= $delete_link?>
  </div>
</div>
</body>
</html>
