<?
function createDatabase()
{
  $servername = "localhost";
  $username = "root";
  $password = "mysql";
  $dbname = "todolist";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    echo "Connected successfully";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

function readlists(){
  $dbConn = createDatabase();
  $stmt = $dbConn->prepare("SELECT * FROM `lists`");
  $stmt->execute();
  $result = $stmt->fetchAll();
  $dbConn = null;
  return $result;
}

function deletelist($id){
  $dbConn = createDatabase();
  $stmt = $dbConn->prepare("DELETE FROM `lists` WHERE id='$id'");
  $stmt->execute();
  $dbConn = null;
}

function createlist($name){
  $dbConn = createDatabase();
  $stmt = $dbConn->prepare("INSERT INTO `lists`(`name`) VALUES ('$name')");
  $stmt->execute();
  $dbConn = null;
}
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

  <h2>Create new list <a href="create.php"><i title="Create new list" class="far fa-plus-square"></i></a></h2>

  <div id="lists">
    <h2>Lists</h2>
    <?
    $result = readlists();
    foreach ($result as $result) {
      echo $result["name"];?> <i class="fas fa-trash-alt" id="<?echo $result["id"];?>"></i> <i class="fas fa-pencil-alt" id="<?echo $result["id"];?>"></i>
      <?
      echo "<br>";
    } ?>
  </div>


  <footer id="footer">&copy; Pieter Huisman 99047256 <? date('Y') ?></footer>
</body>

</html>