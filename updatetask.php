<?
// lees het bestand db.php zodat de database functies hier te gebruiken zijn (createDatabase, readList)
require 'db.php';

// deze pagina kan alleen aangeroepen worden als er een ID in de URL staat, als volgt:
// http://localhost/www/Chalange%20BackEnd/update.php?id=2
if (array_key_exists('id', $_GET) == false) {
    echo "ERROR: Je hebt geen id meegegeven in de URL.";
    die();
}

// haal de lijst op voor het gegeven id
$id = $_GET["id"];
$current_task = readtask($id);

// als een formulier is opgestuurd, stuur dan de gewijzigde naam door naar de functie updatelist in db.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    updatetask($id);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Create list</title>
</head>

<body>
    <a href="index.php"><i title="Go back to previous page" id="previousbtn" class="fas fa-arrow-circle-left"></i></a>

    <div id="createlistform">
        <form id="taskform" method="post">
            Name: <input type="text" name="name" value="<?=$current_task["name"]?>"><br>
            <textarea maxlength="255" rows="4" cols="50" name="description" form="taskform"><?=$current_task["description"]?></textarea><br>
            time: <input type="time" name="time" value="<?=$current_task["time"]?>"><br>
            Date: <input type="date" name="date" value="<?=$current_task["date"]?>"><br>
            Status: <select name="status" value="<?=$current_task['status']?>">
            <option value="Complete">Complete</option>
            <option value="Ongoing">Ongoing</option>
            <option value="On_hold">On hold</option></select>
            <input type="submit" value="Send">
        </form>
    </div>
    <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>