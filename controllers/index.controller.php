<?php

// $file = file_get_contents("../json/items.json");
//
// $data = json_decode($file, true);
//
// var_dump($data);
require_once "../classes/item.php";
// $item = [];
// $item_id = 0;
// $item_description = $_POST['new_item'];

$new_item = new Item($_POST['new_item']);
$new_item->save();
