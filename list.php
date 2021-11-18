<?
require 'db.php';
$listid = $_GET["id"];
$currentlist = readlist($listid);
$alltasks = readtasks($listid);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alltasks = sorttasks($listid, $_POST['type'], $_POST['order']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Create task</title>
</head>

<body>
    <a href="index.php"><i title="Go back to previous page" id="previousbtn" class="fas fa-arrow-circle-left"></i></a>
    <form id="sorttime" method="post">

        sort <select name="type">
            <option value="time">Time</option>
            <option value="status">Status</option>
        </select>
        <select name="order">
            <option value="ASC">ASC</option>
            <option value="DESC">DESC</option>
        </select>
        <input type="submit" value="Sort">
    </form>

    <h1 id="header"><? echo $currentlist["name"]; ?></h1>

    <h2 id="createtask">Create new task <a href="createtask.php?id=<? echo $listid; ?>"><i title="Create new task" class="far fa-plus-square"></i></a></h2>

    <div id="tasks">
        <h2>tasks</h2>
        <?
        foreach ($alltasks as $task) {
            echo 'name: ' . $task["name"] . '<br>';
            echo 'description: ' . $task["description"] . '<br>';
            echo 'time: ' . $task["time"] . '<br>';
            echo 'date: ' . $task["date"] . '<br>';
            echo 'status: ' . $task["status"] . '<br>';
        ?>
            <a href="deletetask.php?id=<? echo $task["id"] ?>">
                <i class="fas fa-trash-alt"></i></a>
            <a href="updatetask.php?id=<? echo $task["id"] ?>">
                <i class="fas fa-pencil-alt" id="<? echo $task["id"]; ?>"></i></a>
        <?
            echo "<br>";
        } ?>
    </div>

    <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>