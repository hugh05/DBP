<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> netflix movie & TV show </title>
</head>

<body>
    <h1>넷플릭스 영화 및 TV 프로그램 검색</h1>
    (1) 국가별 시청 가능한 영화, TV 프로그램 검색 <br>
    <form action="country.php" method="POST">
        <select name="type">
        <option value="TV Show">TV Show</option>
        <option value="Movie">Moive</option>
        </select>
        <input type="text" name="country" placeholder="country">
        <input type="submit" value="search">
    </form>
    (2) 러닝타임으로 영화 검색<br>
    <form action="movie_runningtime.php" method="POST">
    <input type="text" name="min" placeholder="min ex)75"> <b>[분]</b> 
     <select name="minmoreless">
        <option value=">=">이상</option>
        <option value="<=">이하</option>
        </select>
        <input type="submit" value="search">
    </form>
    (3) 연도별 영화, TV 프로그램 검색 <br>
    <form action="release_year.php" method="POST">
    <input type="text" name="year" placeholder="yaer ex)2020">
        <select name="yearmoreless">
        <option value=">=">이상</option>
        <option value="=">해당년도</option>
        <option value="<=">이하</option>
        </select>
        <input type="submit" value="search">
    </form>
</body>
</html>