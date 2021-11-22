<?
//laad de pagina alleen als het een connectie kan maken met de database en alle bijhorende SQL functiess

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

//als de server een post request krijgt voer de delete task functie uit op de database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    deletetask($id);
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

    <form method="post">
        <?= "Are you sure you want to delete $current_task[name]?" ?><br>

        <input type="submit" name="id" onclick="return confirm('Weet je zeker dat je het wilt verwijderen?')">
    </form>
    <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>