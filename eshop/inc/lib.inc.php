<?php

function addItemToCatalog($title, $author, $pubyear, $price, $link)
{
    $sql = "INSERT into catalog (title, author, pubyear, price) VALUES (?, ?, ?, ?)";

    if (!$stmt = mysqli_prepare($link, $sql))
        return false;
    mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
};


function selectAllItems(){
    global $link;
    $sort = "SELECT id , title , author, pubyear, price FROM catalog";
    if(!$result = mysqli_query($link, $sort))
        return false;
    $items= mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    return $items;
}

function saveBasket(){
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket', $basket, time()+60*60*24*55);
}

function basketInit(){
    global $basket, $count;
    if(!isset($_COOKIE['basket'])){
        $basket = ['orderid' => uniqid()];
        saveBasket();
    }
    else{
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = count($basket) -1;
    }
}

function add2Basket($id){
    global $basket;
    $basket[$id] = 1;
    saveBasket();
}
