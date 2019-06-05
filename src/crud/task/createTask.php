<?php

include_once "config/database.php";
include_once "src/objects/tasks.php";

$database = new Database();
$db = $database->getConnection();

$task = new Tasks($db);


$page_title = "Create a new task?";
include_once "templates/bootstrap/layout_header.php";
 
?>
<?php 

if($_POST){

    $task->task_name = $_POST['task_name'];
    $task->task_desc = $_POST['task_desc'];

    if($task->createTasks()){
        echo "<div class='alert alert-success'>Task created.</div>";
    }

    else{
        echo "<div class='alert alert-danger'>Task creation failed.</div>";
    }
}
?>

<form action="" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Task Name</td>
            <td><input type='text' name='task_name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Task Description</td>
            <td><input type='text' name='task_desc' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='taskHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>