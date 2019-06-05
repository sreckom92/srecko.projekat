<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'config/database.php';
include_once 'src/objects/projects.php';

$page_title = "Update project";
include_once "templates/bootstrap/layout_header.php";

$database = new Database();
$db = $database->getConnection();

$projects = new Projects($db);
$projects->id = $id;

$projects->readOne();
 
?>
<?php 

if($_POST){

    $projects->project_name = $_POST['project_name'];
    $projects->project_desc = $_POST['project_desc'];

    if($projects->updateProjects()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Project was updated.";
        echo "</div>";
    }

    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update project.";
        echo "</div>";
    }
}
?>
 
<form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Project Name</td>
            <td><input type='text' name='project_name' value='<?php echo $projects->project_name; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Project Description</td>
            <td><input type='text' name='project_desc' value='<?php echo $projects->project_desc; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
    <a href='projectHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>