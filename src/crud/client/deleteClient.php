<?php 
include $_SERVER['DOCUMENT_ROOT'].'/config/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/objects/clients.php';

$page_title = "Client Deletion";
include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_header.php';

$delete_id = htmlspecialchars($_GET["id"]);
$database = new Database();
$db = $database->getConnection();

$client = new Clients($db);
$client->deleteClients($delete_id);

 echo "<div class='alert alert-success alert-dismissable'>";
            echo "Client deleted.";
echo "<a href='clientHome' class='btn btn-default pull-left'>Back</a>";

include $_SERVER['DOCUMENT_ROOT'].'/templates/bootstrap/layout_footer.php';