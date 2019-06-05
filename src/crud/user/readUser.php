<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'config/database.php';
include_once 'src/objects/users.php';

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);

$users->id = $id;

$users->readOne();

$page_title = "View User";

include_once "templates/bootstrap/layout_header.php";

echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>Task</th>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>{$users->username}</td>";
        echo "<td>{$users->task}</td>";
    echo "</tr>";
 
echo "</table>";
echo "<a href='userHome' class='btn btn-default pull-left'>Back</a>";

include_once "templates/bootstrap/layout_footer.php";
?>