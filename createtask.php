<?
    require 'db.php';

  // haal de lijst op voor het gegeven id
  $id = $_GET["id"];
  $current_list = readList($id);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( createtask($id) == true ) {
            header("Location: index.php");
        } else {
            echo "Fout!";
        }
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
            Name: <input type="text" name="name"><br>
            <textarea maxlength="255" rows="4" cols="50" name="description" placeholder="Enter description here..." form="taskform"></textarea><br>
            time: <input type="time" name="time"><br>
            Date: <input type="date" name="date"><br>
            <input type="submit" value="Send">
        </form>
    </div>
    <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>