<?php
/* Основные настройки */
 $DB_HOST = "localhost";
 $DB_LOGIN = "root";
 $DB_PASSWORD = "";
 $DB_NAME = "gbook";

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$link = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD,  $DB_NAME);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if ($name != ''){
    $sql = "INSERT INTO msgs (name, email, msg)
    VALUES ('$name', '$email', '$msg')";
    $result = mysqli_query($link,$sql);
}


/* Основные настройки */


/* Сохранение записи в БД */

/* Сохранение записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>

<?php
/* Вывод записей из БД */
$zapros = "SELECT id, name, email, msg,datetime
 FROM msgs
 ORDER BY id DESC";
$a = mysqli_query($link, "SELECT COUNT(*) as cnt  FROM msgs");
$b = mysqli_fetch_array($a);
$count= $b['cnt'];

/* Вывод записей из БД */


?>
<p>Всего записей в гостевой книге:<?php echo $count ?> количество записей</p>

<?php
$vivod = mysqli_query($link, $zapros);
if(isset($_GET['delete'])){
    $del = mysqli_query($link, "DELETE FROM msgs WHERE id = {$_GET['delete']}");

}

while ($data = mysqli_fetch_array($vivod)){
    echo "<p>
 <a href='mailto:{$data['email']}'>{$data['name']}</a>
    {$data['datetime']}
 написал<br />{$data['msg']}.
</p>
<p style='text-align: right'>
 <a href='http://qwe/index.php?id=gbook&delete={$data['id']}'>
        Удалить</a>
</p>";

}



