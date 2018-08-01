<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.08.2018
 * Time: 13:41
 */

# Local
//$connect = mysqli_connect("localhost", "root", "", "global");

# Host
$connect = mysqli_connect("localhost", "ailinov", "neto1587", "global");

if(!$connect) {
    echo "Нет соединения...";
}
?>
    
    <style>
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        
        td, th {
            border: 1px solid #ccc;
            padding: 5px;
        }
        
        th {
            background: #eee;
        }
    </style>
    <h1>Библиотека успешного человека</h1>
    
    <form method="GET">
        <input type="text" name="isbn" placeholder="ISBN" value="" />
        <input type="text" name="name" placeholder="Название книги" value="" />
        <input type="text" name="author" placeholder="Автор книги" value="" />
        <input type="submit" value="Поиск" />
    </form>

<?php
$myisbn   = $_GET['isbn'];
$myname   = strip_tags(trim($_GET['name']));
$myauthor = strip_tags(trim($_GET['author']));

if(isset($myisbn) OR isset($myname) OR isset($myauthor)) {
//    $sql = "SELECT * FROM books WHERE isbn LIKE {$myisbn} AND name LIKE {%$myname%} AND author LIKE {%$myauthor%}";
    $sql = "SELECT * FROM books WHERE isbn LIKE '%" . $myisbn . "%' AND name LIKE '%" . $myname . "%' AND
    author LIKE '%" . $myauthor . "%'";
    
    $res = mysqli_query($connect, $sql);?>
    
    <table>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Год выпуска</th>
            <th>ISBN</th>
            <th>Жанр</th>
        </tr>
        <? while($data = mysqli_fetch_array($res)) { ?>
            <tr>
                <td><? echo $data['name'] ?></td>
                <td><? echo $data['author'] ?></td>
                <td><? echo $data['year'] ?></td>
                <td><? echo $data['isbn'] ?></td>
                <td><? echo $data['genre'] ?></td>
            </tr>
        <?php } ?>
    </table>

<? }?>