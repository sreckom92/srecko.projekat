<?php 
include $_SERVER['DOCUMENT_ROOT'].'/config/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/objects/projects.php';

$page_title = "Project Deletion";
include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_header.php';

$delete_id = htmlspecialchars($_GET["id"]);
$database = new Database();
$db = $database->getConnection();
$project = new Projects($db);
$project->deleteprojects($delete_id);

 echo "<div class='alert alert-success alert-dismissable'>";
            echo "Project deleted.";
echo "<a href='projectHome' class='btn btn-default pull-left'>Back</a>";

include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_footer.php';