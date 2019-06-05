<?php

include_once "config/database.php";
include_once "src/objects/projects.php";

$database = new Database();
$db = $database->getConnection();

$project = new Projects($db);


$page_title = "Create a new project?";
include_once "templates/bootstrap/layout_header.php";
 
?>
<?php 

if($_POST){

    $project->project_name = $_POST['project_name'];
    $project->project_desc = $_POST['project_desc'];

    if($project->createProjects()){
        echo "<div class='alert alert-success'>Project created.</div>";
    }

    else{
        echo "<div class='alert alert-danger'>Project creation failed.</div>";
    }
}
?>

<form action="" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Project Name</td>
            <td><input type='text' name='project_name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Project Description</td>
            <td><input type='text' name='project_desc' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='projectHome' class='btn btn-default pull-left'>Back</a>
</form>
<?php

include_once "templates/bootstrap/layout_footer.php";
?>