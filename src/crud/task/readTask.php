<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'config/database.php';
include_once 'src/objects/tasks.php';

$database = new Database();
$db = $database->getConnection();

$tasks = new Tasks($db);

$tasks->id = $id;

$tasks->readOne();

$page_title = "View Task";

include_once "templates/bootstrap/layout_header.php";

echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<th>Task Name</th>";
        echo "<th>Task Description</th>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>{$tasks->task_name}</td>";
        echo "<td>{$tasks->task_desc}</td>";
    echo "</tr>";
 
echo "</table>";
echo "<a href='taskHome' class='btn btn-default pull-left'>Back</a>";

include_once "templates/bootstrap/layout_footer.php";
?>