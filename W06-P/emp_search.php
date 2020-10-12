<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query= mysqli_query($link, "SELECT emp_no FROM employees WHERE first_name = '{$_POST['first_name']}' && last_name = '{$_POST['last_name']}'");
    $result = mysqli_fetch_array($query)['emp_no'];
    $echo = '';
    if($result){
        $echo .= $_POST['first_name'].'&nbsp'.$_POST['last_name'].'의 사번은 '.$result.' 입니다';
    } else $echo .= "해당 직원이 존재하지 않습니다.";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템 | 직원 정보 조회</a></h2>
    <?=$echo?>
    <h3><a href="emp_select.php">돌아가기</a></h3>
</body>

</html>