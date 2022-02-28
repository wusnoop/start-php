<?php
require_once "lib.inc.php";
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "eshop";
const ORDERS_LOG = "orders.log";

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD,  DB_NAME);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$basket = [];
$count = 0;
basketInit();
var_dump($basket);