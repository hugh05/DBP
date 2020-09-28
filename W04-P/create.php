<?php
  $link = mysqli_connect("localhost:3307", "root", "hy0512", "dbp");
  $query = "SELECT * FROM cook";
  $result = mysqli_query($link, $query);
  $select_form = '<select name="cook_id">';
  while ($row = mysqli_fetch_array($result)) {
      $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 자취생 간단 레시피 - 레시피 전수 </title>
</head>
<body>
  <h1> <a href="index.php"> 자취생 간단 레시피 </a></h1>
  <h2>당신의 특별 레시피를 전수해 주세요.</h2>
  <form action="process_create.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <?= $select_form ?>
    <p><input type="submit"></p>
  </form>
</body>
</html>
