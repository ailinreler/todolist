<?php

require_once "../classes/item.php";

$item = Item::getItem($_GET['item']);
var_dump($item);
