<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query_start_no = mysqli_query($link, "SELECT emp_no FROM employees ORDER BY emp_no ASC LIMIT 1");
    $emp_start_no = mysqli_fetch_array($query_start_no)['emp_no'];
    $query_end_no = mysqli_query($link, "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1");
    $emp_end_no = mysqli_fetch_array($query_end_no)['emp_no'];
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템 | 직원 정보 조회</a></h2>
    1. 10명씩 조회
    <form action="emp_select10_process.php" method="POST">
        <input type="text" name="emp_start_no" placeholder="<?=$emp_start_no?>">
        ~
        <input type="text" name="emp_end_no" placeholder="<?=$emp_end_no?>">
        <input type="submit" value="Search">
    </form>
    2. 1명씩 조회
    <form action="emp_select1_process.php" method="POST">
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Search">
    </form>
    3. 직원 번호 찾기
    <form action="emp_search.php" method="POST">
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>
</body>

</html>