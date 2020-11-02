<?php
   $link = mysqli_connect("localhost", "admin", "admin", "netflix");
   $min = $_POST['min'];
   $minmoreless = $_POST['minmoreless'];
   $query = "
    SELECT
    title, director, country, rating, duration, listed_in, description, cast
    FROM contents 
    WHERE type = 'Movie' && duration{$minmoreless}{$min}
    ";

   $result = mysqli_query($link, $query);
   $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['title'];
        $article .= '</td><td>';
        $article .= $row['director'];
        $article .= '</td><td>';
        $article .= $row['country'];
        $article .= '</td><td>';
        $article .= $row['rating'];
        $article .= '</td><td>';
        $article .= $row['duration'];
        $article .= '</td><td>';
        $article .= $row['listed_in'];
        $article .= '</td><td>';
        $article .= $row['description'];
        $article .= '</td><td>';
        $article .= $row['cast'];
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
        <title>netflix movie & TV show</title>
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
            th:first-child{
                width: 15%;
            }
            th:last-child{
                width: 20%;
            }
        </style>
    </head>
    <body>
        <h2><a href="index.php">넷플릭스 영화 및 TV 프로그램 검색</a> | 러닝타임으로 영화 검색</h2>
        <table>
            <tr>
                <th>title</th>
                <th>director</th>
                <th>country</th>
                <th>rating</th>
                <th>duration</th>
                <th>listed_in</th>
                <th>description</th>
                <th>cast</th>
            </tr>
            <?=$article?>
        </table>
    </body>
</html>