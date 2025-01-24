<?php

header("Access-Control-Allow-Origin: *"); // Permite solicitudes solo de este origen
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}



// Obtener la ruta de la solicitud
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Lógica para manejar las rutas
switch (true) {

    case preg_match('/^\/$/', $request):
        echo json_encode(["message" => "Bienvenido al backend"]);
        break;

        // Dashboard
    case preg_match('/^\/backend\/dashboard/', $request):
        require __DIR__ . '/crud/dashboard/dashboard1.php';
        break;

        // Filter Routes
    case preg_match('/^\/backend\/filter\/get_category/', $request):
        require __DIR__ . '/crud/filter/get_category.php';
        break;

    case preg_match('/^\/backend\/filter\/get_state/', $request):
        require __DIR__ . '/crud/filter/get_state.php';
        break;

        // Profile Routes
    case preg_match('/^\/backend\/profile\/profile/', $request):
        require __DIR__ . '/crud/profile/profile.php';
        break;

    case preg_match('/^\/backend\/profile\/changePhoto/', $request):
        require __DIR__ . '/crud/profile/changePhoto.php';
        break;

    case preg_match('/^\/backend\/tasks\/create_task/', $request):
        require __DIR__ . '/crud/tasks/create_task.php';
        break;

    case preg_match('/^\/backend\/tasks\/delete_task/', $request):
        require __DIR__ . '/crud/tasks/delete_task.php';
        break;

    case preg_match('/^\/backend\/tasks\/edit_task/', $request):
        require __DIR__ . '/crud/tasks/edit_task.php';
        break;

    case preg_match('/^\/backend\/tasks\/expire_tasks/', $request):
        require __DIR__ . '/crud/tasks/expire_tasks.php';
        break;

    case preg_match('/^\/backend\/tasks\/specificTask/', $request):
        require __DIR__ . '/crud/tasks/specificTask.php';
        break;

    case preg_match('/^\/backend\/tasks\/tasks/', $request):
        require __DIR__ . '/crud/tasks/tasks.php';
        break;

        // Login and Logout Routes
    case preg_match('/^\/backend\/login/', $request):
        require __DIR__ . '/crud/login.php';
        break;

    case preg_match('/^\/backend\/logout/', $request):
        require __DIR__ . '/crud/logout.php';
        break;

        // Registration Route
    case preg_match('/^\/backend\/registration/', $request):
        require __DIR__ . '/crud/registration.php';
        break;

        // Session Check
    case preg_match('/^\/backend\/check_session/', $request):
        require __DIR__ . '/crud/check_session.php';
        break;

 

        // Database Connection
    case preg_match('/^\/backend\/uploads/', $request):
        require __DIR__ . '/db_connection.php';
        break;

        // Default 404 Error
    default:
        http_response_code(404);  // Devuelve un error 404
        echo json_encode(["error" => "Endpoint no encontrado"]);
        break;
}
