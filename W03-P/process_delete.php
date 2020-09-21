<?php
  $link = mysqli_connect("localhost:3307", "root", "hy0512", "dbp");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );
  $query = "
    DELETE
      FROM recipe
      WHERE ID = {$filtered['id']}
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '특별레시피 삭제완료. 다른 특별 레시피를 기다릴게요 <a href="index.php">돌아가기</a>';
  }
