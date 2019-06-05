<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'config/database.php';
include_once 'src/objects/tasks.php';

$page_title = "Update task";
include_once "templates/bootstrap/layout_header.php";

$database = new Database();
$db = $database->getConnection();

$tasks = new Tasks($db);
$tasks->id = $id;

$tasks->readOne();
 
?>
<?php 

if($_POST){

    $tasks->task_name = $_POST['task_name'];
    $tasks->task_desc = $_POST['task_desc'];

    if($tasks->updatetasks()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Task was updated.";
        echo "</div>";
    }

    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update task.";
        echo "</div>";
    }
}
?>
 
<form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Task Name</td>
            <td><input type='text' name='task_name' value='<?php echo $tasks->task_name; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Task Description</td>
            <td><input type='text' name='task_desc' value='<?php echo $tasks->task_desc; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
    <a href='taskHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>