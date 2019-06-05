<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'config/database.php';
include_once 'src/objects/projects.php';

$database = new Database();
$db = $database->getConnection();

$projects = new Projects($db);

$projects->id = $id;

$projects->readOne();

$page_title = "View Project";

include_once "templates/bootstrap/layout_header.php";

echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<th>Project Name</th>";
        echo "<th>Project Descripton</th>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>{$projects->project_name}</td>";
        echo "<td>{$projects->project_desc}</td>";
    echo "</tr>";
 
echo "</table>";
echo "<a href='projectHome' class='btn btn-default pull-left'>Back</a>";

include_once "templates/bootstrap/layout_footer.php";
?>