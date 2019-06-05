<?php 
include $_SERVER['DOCUMENT_ROOT'].'/config/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/objects/tasks.php';

$page_title = "task Deletion";
include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_header.php';

$delete_id = htmlspecialchars($_GET["id"]);
$database = new Database();
$db = $database->getConnection();
$task = new Tasks($db);
$task->deleteTasks($delete_id);

 echo "<div class='alert alert-success alert-dismissable'>";
            echo "Task deleted.";
echo "<a href='taskHome' class='btn btn-default pull-left'>Back</a>";

include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_footer.php';