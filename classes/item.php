<?php

class Item{

  public $item_id;
  public $item_description;
  public $finished = 0;

  public function __construct($item_description)
  {
    $this->item_description = $item_description;
    return $this;
  }

  public function finished()
  {
    $this->finished = 1;
  }

  public function save()
  {

    if (!file_exists('../json/items.json')) {
      $this->item_id = 1;
      $json = json_encode($this);
      $f = file_put_contents('../json/items.json', PHP_EOL . $json . PHP_EOL, FILE_APPEND);
      fclose($recurso);
    }else{
      $recurso = fopen('../json/items.json', 'r+');
      $line = fgets($recurso);

      $contador = 1;

      while (($line = fgets($recurso)) !== false) {
        $item = json_decode($line, true);
        $contador ++;

      }

      $this->item_id = $contador;

      $json = json_encode($this);
      $f = file_put_contents('../json/items.json', $json . PHP_EOL, FILE_APPEND);
      fclose($recurso);
    }
    header('location: ../index.php');

    return $this;

  }

  static public function getAll()
  {
    $recurso = fopen('json/items.json', 'r+');
    $line = fgets($recurso);
    $items = [];

    while (($line = fgets($recurso)) !== false) {
      $item = json_decode($line, true);
      $itemId = $item['item_id'];
      $item_description = $item['item_description'];
      $finished = $item['finished'];

      $new_item = new Item($item_description);
      $new_item->item_id = $itemId;
      $new_item->finished = $finished;
      $items[] = $new_item;
    }

    return $items;


  }

  static public function getItem($id)
  {

    $recurso = fopen('../json/items.json', 'r+');
    $line = fgets($recurso);

    while (($line = fgets($recurso)) !== false) {
      $item = json_decode($line, true);

      if ($item['item_id'] == $id) {
        var_dump($item);
        exit;
        return $item;
      }
    }
  }




}
