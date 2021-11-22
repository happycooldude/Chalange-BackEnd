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

function readlist($id)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `lists` WHERE `id` = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}


function readlists()
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `lists`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function updatelist($id, $newName)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("UPDATE `lists` SET `name`= :new WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":new", $newName);
    $stmt->execute();
    $dbConn = null;
}

function deletelist($id)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("DELETE FROM `lists` WHERE id = :id; DELETE FROM `tasks` WHERE listID = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn = null;
}

function createlist($name)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("INSERT INTO `lists`(`name`) VALUES (:name)");
    $stmt->bindParam(":name", $name);
    $stmt->execute();
    $dbConn = null;
}

function createtask($list_id)
{
    // check if list_id exists in database
    if (readlist($list_id) == false) {
        // list id is not valid!
        return false;
    } else {
        // list id is valid, so proceed
        $dbConn = createDatabase();
        $stmt = $dbConn->prepare("INSERT INTO `tasks`(`name`, `description`, `time`, `date`, `listID`) VALUES (:name, :description, :time, :date, :listID)");
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":time", $_POST['time']);
        $stmt->bindParam(":date", $_POST['date']);
        $stmt->bindParam(":listID", $list_id);
        $stmt->execute();
        $dbConn = null;
        return true;
    }
}

function readtasks($listid)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `tasks` WHERE `listID` = :id");
    $stmt->bindParam(":id", $listid);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function readtask($taskid)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `tasks` WHERE `id` = :id");
    $stmt->bindParam(":id", $taskid);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

function deletetask($taskid)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("DELETE FROM `tasks` WHERE `id` = :id");
    $stmt->bindParam(":id", $taskid);
    $stmt->execute();
    $dbConn = null;
}

function updatetask($id)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("UPDATE `tasks` SET `name`=:name,`description`=:description,`time`=:time,`date`=:date,`status`=:status WHERE `id` = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":name", $_POST["name"]);
    $stmt->bindParam(":description", $_POST['description']);
    $stmt->bindParam(":time", $_POST['time']);
    $stmt->bindParam(":date", $_POST['date']);
    $stmt->bindParam(":status", $_POST['status']);
    $stmt->execute();
    $dbConn = null;
}

function sorttasks($list_id, $type, $order)
{
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `tasks` WHERE `listID` = :id ORDER BY $type " . $order);
    $stmt->bindParam(":id", $list_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function dd($objects)
{
    echo "<div style='display: block'>";
    echo "<pre>";
    var_dump($objects);
    echo "</pre>";
    echo "</div>";
    die();
}
