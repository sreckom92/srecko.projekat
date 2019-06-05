<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'config/database.php';
include_once 'src/objects/users.php';

$page_title = "Update User";
include_once "templates/bootstrap/layout_header.php";

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);
$users->id = $id;

$users->readOne();
 
?>
<?php 

if($_POST){

    $users->username = $_POST['username'];
    $users->password = $_POST['password'];
    $users->task = $_POST['task'];

    if($users->updateUsers()){
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
            <td><input type='text' name='username' value='<?php echo $users->username; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='text' name='password' value='<?php echo $users->password; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Task</td>
            <td><input type='text' name='task' value='<?php echo $users->task; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
    <a href='userHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>