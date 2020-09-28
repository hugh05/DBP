<?php
  $link = mysqli_connect("localhost:3307", "root", "hy0512", "dbp");
  $filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );
  $query = "
    UPDATE recipe
      SET
        title  = '{$filtered['title']}',
        description = '{$filtered['description']}'
      WHERE ID = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '특별레시피 수정완료! <a href="index.php">돌아가기</a>';
  }
