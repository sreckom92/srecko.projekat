<?php 
include $_SERVER['DOCUMENT_ROOT'].'/config/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/objects/users.php';

$page_title = "User Deletion";
include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_header.php';

$delete_id = htmlspecialchars($_GET["id"]);
$database = new Database();
$db = $database->getConnection();
$user = new Users($db);
$user->deleteUsers($delete_id);

 echo "<div class='alert alert-success alert-dismissable'>";
            echo "User deleted.";
echo "<a href='userHome' class='btn btn-default pull-left'>Back</a>";

include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_footer.php';