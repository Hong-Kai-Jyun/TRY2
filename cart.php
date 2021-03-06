<?php
session_start();

$page_title="Cart";
include 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if($action=='removed'){//action變數在remove_from_cart.php回傳網址時附帶上去
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}

else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}

if(count($_SESSION['cart_items'])>0){

    // get the product ids
    $ids = "";
    foreach($_SESSION['cart_items'] as $id=>$value){
        $ids = $ids . $id . ",";
    }

    // remove the last comma
    $ids = rtrim($ids, ',');
echo $ids;
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";

    // our table heading
    echo "<tr>";
    echo "<th class='textAlignLeft'>Product Name</th>";
    echo "<th>Price (USD)</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    $query = "SELECT id, name, price FROM products WHERE id IN ({$ids}) ORDER BY name";
echo $query;
    $stmt = $con->prepare( $query );
    $stmt->execute();

    $total_price=0;//累計總金額

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>&#36;{$price}</td>";
        echo "<td>";
        echo "<a href='remove_from_cart.php?id={$id}&name={$name}' class='btn btn-danger'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
        echo "</a>";
        echo "</td>";
        echo "</tr>";

        $total_price+=$price;   //echo  'total_price:'.$total_price; //累計總金額的意思
    }

    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td>&#36;{$total_price}</td>";
    echo "<td>";
    echo "<a href='#' class='btn btn-success'>";
    echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
    echo "</a>";
    echo "</td>";
    echo "</tr>";

    echo "</table>";
}

else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}

include 'layout_foot.php';
?>