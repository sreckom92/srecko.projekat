
<?php

$request = $_SERVER["REQUEST_URI"];
$getQuery = $_SERVER["QUERY_STRING"];

switch ($request) {
    case '/':
        require __DIR__ . '/src/home.html';
        break;
    case '/home':
        require __DIR__ . '/src/home.html';
        break;
    case '':
        require __DIR__ . '/src/home.html';
        break;

    case '/createUser':
        require __DIR__ . '/src/crud/user/createUser.php';
        break;
    case '/createClient':
        require __DIR__ . '/src/crud/client/createClient.php';
        break;
    case '/createTask':
        require __DIR__ . '/src/crud/task/createTask.php';
        break;
    case '/createProject':
        require __DIR__ . '/src/crud/project/createProject.php';
        break;

    case '/userHome':
        require __DIR__ . '/src/userHome.php';
        break;
    case '/clientHome':
        require __DIR__ . '/src/clientHome.php';
        break;
    case '/projectHome':
        require __DIR__ . '/src/projectHome.php';
        break;
    case '/taskHome':
        require __DIR__ . '/src/taskHome.php';
        break;

    case '/readUser?' . $getQuery:
        require __DIR__ . '/src/crud/user/readUser.php';
        break;
    case '/readClient?' . $getQuery:
        require __DIR__ . '/src/crud/client/readClient.php';
        break;
    case '/readProject?' . $getQuery:
        require __DIR__ . '/src/crud/project/readProject.php';
        break;
    case '/readTask?' . $getQuery:
        require __DIR__ . '/src/crud/task/readTask.php';
        break;
        
    case '/deleteUser?' . $getQuery:
        require __DIR__ . '/src/crud/user/deleteUser.php';
        break;
    case '/deleteClient?' . $getQuery:
        require __DIR__ . '/src/crud/client/deleteClient.php';
        break;
    case '/deleteProject?' . $getQuery:
        require __DIR__ . '/src/crud/project/deleteProject.php';
        break;
    case '/deleteTask?' . $getQuery:
        require __DIR__ . '/src/crud/task/deleteTask.php';
        break;

    case '/updateUser?'. $getQuery:
        require __DIR__ . '/src/crud/user/updateUser.php';
        break;
    case '/updateClient?'. $getQuery:
        require __DIR__ . '/src/crud/client/updateClient.php';
        break;
    case '/updateProject?'. $getQuery:
        require __DIR__ . '/src/crud/project/updateProject.php';
        break;
    case '/updateTask?'. $getQuery:
        require __DIR__ . '/src/crud/task/updateTask.php';
        break;

    default:
        require __DIR__ . '/src/misc/404.php';
        break;
}

?>