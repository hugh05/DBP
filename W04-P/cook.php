<?php
  $link = $link = mysqli_connect("localhost:3307", "root", "hy0512", "dbp");
  $query = "SELECT * FROM cook";
  $result = mysqli_query($link, $query);
  $cook_info='';
  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'profile' => htmlspecialchars($row['profile'])
    );
      $cook_info .= '<tr>';
      $cook_info .= '<td>'.$filtered['id'].'</td>';
      $cook_info .= '<td>'.$filtered['name'].'</td>';
      $cook_info .= '<td>'.$filtered['profile'].'</td>';
      $cook_info .= '<td><a href="cook.php?id='.$filtered['id'].'">수정</a></td>';
      $cook_info .= '<td>
        <form action="process_delete_cook.php" method="post">
          <input type = "hidden" name="id" value="'.$filtered['id'].'">
          <input type = "submit" value = "삭제">
        </form>
      </td>';
      $cook_info .= '</tr>';
  };

  $escaped = array(
    'name' => '',
    'profile' => ''
  );
  $label_submit = '요리사 등록';
  $form_action = 'process_create_cook.php';
  $form_id='';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered_id, 'integer');
      $query = "SELECT * FROM cook WHERE id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['profile'] = htmlspecialchars($row['profile']);
      $label_submit = '수정하기';
      $form_action = 'process_update_cook.php';
      $form_id = '<input type = "hidden" name ="id" value = "'.$_GET['id'].'">';
  };

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 자취생 간단 레시피 - 요리사 등록 </title>
</head>
<body>
    <h1> <a href="index.php"> 자취생 간단 레시피 </a></h1>
    <table border="1">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>profile</th>
        <th>update</th>
        <th>delete</th>
      </tr>
      <?= $cook_info ?>
    </table><br>
    <form action=<?= $form_action ?> method="post">
      <?= $form_id ?>
      <label for="fname">name:</label><br>
      <input type="text" id="name" name="name" placeholder="name"
      value = "<?= $escaped['name']?>"><br>
      <label for="lname">profile:</label><br>
      <input type="text" id="profile" name="profile" placeholder="profile"
      value = "<?= $escaped['profile']?>"><br><br>
      <input type="submit" value="<?=$label_submit?>">
    </form>
  </body>
</html>
