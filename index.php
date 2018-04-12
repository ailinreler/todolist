<?php

require_once "classes/item.php";

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>

  <header>
    <h1>To do list</h1>
  </header>

  <div class="todo-form">
    <div class="container">
      <div class="add-form">

        <form class="form" action="controllers/index.controller.php" method="post">
          <input type="text" name="new_item" placeholder="Add to do item">

          <div class="submit">
            <button type="submit" name="send">Add item!</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div class="todo-list">
    <div class="container">
      <ul>
        <?php

        $items = Item::getAll();

        foreach ($items as $item) { ?>
          <li class="todo-item">
            <div class="item"><?php echo $item->item_description ?></div>
            <div class="actions">
              <a class="delete" href="controllers/delete.controller.php?item=<?php echo $item->item_id ?>">x</a>
              <a class="finished" href="">✓</a>
            </div>
          </li>
<?php  }

         ?>

      </ul>
    </div>
  </div>

</body>
</html>
