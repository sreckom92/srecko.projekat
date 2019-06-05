<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;
 
$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'config/database.php';
include_once 'src/objects/projects.php';

$database = new Database();
$db = $database->getConnection();
 
$project = new Projects($db);

$stmt = $project->readProjects($from_record_num, $records_per_page);

$num = $stmt->rowCount();

$page_title = "Projects Home";
include_once "templates/bootstrap/layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='home' class='btn btn-primary pull-left'>Home</a>";
    echo "<a href='createProject' class='btn btn-success left-margin'>
                 <span class='glyphicon glyphicon-plus'></span> Create a project
                    </a>";
echo "</div>";

if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";

        echo "<tr>";
            echo "<th>Project Name</th>";
            echo "<th>Project Description</th>";

            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$project_name}</td>";
                echo "<td>{$project_desc}</td>";

                echo "<td>";

				echo "
				<a href='readProject?id={$id}' class='btn btn-primary left-margin'>
   				 <span class='glyphicon glyphicon-list'></span> Read
					</a>
 
				<a href='updateProject?id={$id}' class='btn btn-info left-margin'>
    			<span class='glyphicon glyphicon-edit'></span> Edit
				</a>
 
				<a href='deleteProject?id={$id}' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove'></span> Delete
                </a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
$page_url = "projectHome.php?";
$total_rows = $project->countAll();

include_once 'paging.php';
}

else{
    echo "<div class='alert alert-info'>List of projects is empty.</div>";
}

include_once "templates/bootstrap/layout_footer.php";
?>