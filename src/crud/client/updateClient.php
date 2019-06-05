<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'config/database.php';
include_once 'src/objects/clients.php';

$page_title = "Update Client";
include_once "templates/bootstrap/layout_header.php";

$database = new Database();
$db = $database->getConnection();

$clients = new Clients($db);
$clients->id = $id;

$clients->readOne();
 
?>
<?php 

if($_POST){

    $clients->username = $_POST['username'];
    $clients->password = $_POST['password'];
    $clients->project = $_POST['project'];

    if($clients->updateclients()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "User was updated.";
        echo "</div>";
    }

    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update user.";
        echo "</div>";
    }
}
?>
 
<form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' value='<?php echo $clients->username; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='text' name='password' value='<?php echo $clients->password; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>project</td>
            <td><input type='text' name='project' value='<?php echo $clients->project; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
    <a href='clientHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>