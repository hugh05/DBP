<?php
   $link = mysqli_connect("localhost", "admin", "admin", "employees");
   $department = $_POST['department'];
   $title = $_POST['title'];
   $query = "
      select e.*, t.title, d.dept_name 
      from employees e
      inner join dept_emp de on e.emp_no=de.emp_no 
      inner join departments d on d.dept_no = de.dept_no 
      inner join titles t on t.emp_no = e.emp_no
      where d.dept_no = '$department' and t.title = '$title'
      ";

   $result = mysqli_query($link, $query);

   $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['emp_no'];
        $article .= '</td><td>';
        $article .= $row['birth_date'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['gender'];
        $article .= '</td><td>';
        $article .= $row['hire_date'];
        $article .= '</td><td>';
        $article .= $row['title'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8">
        <title>부서/직급별 사원 정보 정보</title>
        <style>
            body{
                font-family: Consolas, monospace;
                font-family: 12px;
            }
            table{
                width: 100%;
            }
            th, td{
                padding: 10px;
                border-bottom: 1px solid #dadada;
            }
        </style>
    </head>
    <body>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서/직급별 사원 정보 정보</h2>
        <table>
            <tr>
                <th>emp_no</th>
                <th>birth_date</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>gender</th>
                <th>hire_date</th>
                <th>title</th>
                <th>dept_name</th>
            </tr>
            <?=$article?>
        </table>
    </body>
</html>