#DBP 7주차 회고록

## 1. 새로 배운내용
- 값을 입력 받아 SQL 쿼리에 사용하기
```
$number = $_GET['number'];

$query = "
    SELECT first_name, last_name, salary, from_date, to_date
    FROM salaries
    LEFT JOIN employees
    ON salaries.emp_no = employees.emp_no        
    ORDER BY salary DESC
    LIMIT ".$number."
";
```

## 2. 문제가 발생하거나 해결한 내용
- SQL쿼리를 작성 할 때 큰 따옴표, 작은 따옴표, 연결해주는 마침표를 사용하는 부분이 어려웠다. 처음에는 SQL쿼리에 PHP변수를 마침표로 연결해서 썼었는데 결과가 나오지 않았다. 여러번의 시도 끝에 작은따옴표와 그냥 변수만 적으니 결과가 나왔다.

## 3. 참고할 만한 내용
- HTML 콤보박스 만들어서 PHP변수로 값 받아오기
** <https://qastack.kr/programming/17139501/using-post-to-get-select-option-value-from-html>
** <https://hianna.tistory.com/322>

## 4. 회고
(+) 
생각 한 대로 구현이 되어 뿌듯했다.

(-)
시험기간이다 보니 많은 시간을 할애할 수 없어 더 많은 기능을 시도해 보지 못한 것이 아쉽다.

(!) 
직급/부서를 선택해 해당하는 직원의 정보를 조회할 수 있게하였다.

실습링크: <https://youtu.be/Gnki_ee6cl4>
