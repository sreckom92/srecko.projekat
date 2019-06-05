<?php

include_once "config/database.php";
include_once "src/objects/users.php";

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);


$page_title = "Create a new user?";
include_once "templates/bootstrap/layout_header.php";
 
?>
<?php 

if($_POST){

    $users->username = $_POST['username'];
    $users->password = $_POST['password'];
    $users->task = $_POST['task'];

    if($users->createUsers()){
        echo "<div class='alert alert-success'>User created.</div>";
    }

    else{
        echo "<div class='alert alert-danger'>User creation failed.</div>";
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
            <td>Task</td>
            <td><input type='text' name='task' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='userHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>