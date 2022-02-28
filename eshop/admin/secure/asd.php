<?php


function addItemToCatalog($title, $author, $pubyear, $price)
{
    $sql = "INSERT into catalog (title, author, pubyear, price) VALUES (?, ?, ?, ?)";

    if (!$stmt = mysqli_prepare($link, $sql))
        return false;
    mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

;

define("DB_HOST","localhost");
define("DB_LOGIN","root");
define("DB_PASSWORD","");
define("DB_NAME","eshop");
define("ORDERS_LOG","orders.log");
$basket = array();
$count = 0;
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD,  DB_NAME);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



addItemToCatalog($title, $author, $pubyear, $price);
if(!addItemToCatalog($title, $author, $pubyear, $price)){
    echo 'Произошла ошибка при добавлении товара в каталог';
}
else {
    header("Location: add2cat.php");
    exit;
}