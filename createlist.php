<?
//laad de pagina alleen als het een connectie kan maken met de database en alle bijhorende SQL functiess
require 'db.php';

// haal de lijst op voor het gegeven id
$id = $_GET["id"];
$current_list = readList($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createlist($_POST['name']);
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
        <form method="post">
            Name: <input type="text" name="name"><br>
            <input type="submit">
        </form>
    </div>
    <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>