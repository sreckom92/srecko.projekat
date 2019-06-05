<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'config/database.php';
include_once 'src/objects/clients.php';

$database = new Database();
$db = $database->getConnection();

$clients = new Clients($db);

$clients->id = $id;

$clients->readOne();

$page_title = "View Client";

include_once "templates/bootstrap/layout_header.php";

echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<th>Client Name</th>";
        echo "<th>Project</th>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>{$clients->username}</td>";
        echo "<td>{$clients->project}</td>";
    echo "</tr>";
 
echo "</table>";
echo "<a href='clientHome' class='btn btn-default pull-left'>Back</a>";

include_once "templates/bootstrap/layout_footer.php";
?>