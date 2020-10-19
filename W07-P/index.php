<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h1>직원 관리 시스템</h1>
    <a href="emp_select.php">(1) 직원 정보 조회</a><br>
    <a href="emp_insert.php">(2) 신규 직원 등록</a><br>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정: <br>
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Search">
    </form>
    <form action="emp_delete.php" method="POST">
        (4) 직원 정보 삭제: <br>
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Delete">
    </form>
    <form action="salary_info.php" method="GET">
    (5) 연봉 정보
    <input type="text" name="number" placeholder="number">
    <input type="submit" value="Search">
    </form>
    <form action="dept_title_info.php" method="POST">
    (6) 부서/직급별 사원 정보 <br>
        부서:
        <select name="department">
        <option value="d009">Customer Service</option>
        <option value="d005">Development</option>
        <option value="d002">Finance</option>
        <option value="d003">Human Resources</option>
        <option value="d001">Marketing</option>
        <option value="d004">Production </option>
        <option value="d006">Quality Management </option>
        <option value="d008">Research</option>
        <option value="d007">Sales</option>
        </select>
        직급:
        <select name="title">
        <option value="Senior Engineer">Senior Engineer</option>
        <option value="Staff">Staff</option>
        <option value="Engineer">Engineer</option>
        <option value="Senior Staff">Senior Staff</option>
        <option value="Assistant Engineer">Assistant Engineer</option>
        <option value="Technique Leader">Technique Leader</option>
        <option value="Manager">Manager</option>
        </select>
        <input type="submit" value="search">
    </form>

</body>

</html>