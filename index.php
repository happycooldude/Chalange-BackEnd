<?
require 'db.php';

?>

<!DOCTYPE html>

<head>
  <title>Challenge BackEnd</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h1 id="header">Todo list</h1>

  <h2 id="createlist">Create new list <a href="createlist.php"><i title="Create new list" class="far fa-plus-square"></i></a></h2>

  <div id="lists">
    <h2>Lists</h2>
    <?
    $allLists = readlists();

    foreach ($allLists as $list) { ?>
      <a href="list.php?id=<? echo $list["id"]; ?>"><? echo $list["name"]; ?></a>
      <a href="deletelist.php?id=<? echo $list["id"] ?>">
        <i class="fas fa-trash-alt"></i></a>
      <a href="updatelist.php?id=<? echo $list["id"] ?>">
        <i class="fas fa-pencil-alt" id="<? echo $list["id"]; ?>"></i></a>
    <?
      echo "<br>";
    } ?>
  </div>


  <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>