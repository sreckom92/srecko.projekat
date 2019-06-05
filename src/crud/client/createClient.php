<?php

include_once "config/database.php";
include_once "src/objects/clients.php";

$database = new Database();
$db = $database->getConnection();

$clients = new Clients($db);


$page_title = "Create a new client?";
include_once "templates/bootstrap/layout_header.php";
 
?>
<?php 

if($_POST){

    $clients->username = $_POST['username'];
    $clients->password = $_POST['password'];
    $clients->project = $_POST['project'];

    if($clients->createClients()){
        echo "<div class='alert alert-success'>Client created.</div>";
    }

    else{
        echo "<div class='alert alert-danger'>Client creation failed.</div>";
    }
}
?>

<form action="" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' class='form-control' /></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='text' name='password' class='form-control' /></td>
        </tr>

        <tr>
            <td>Project</td>
            <td><input type='text' name='project' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='clientHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>