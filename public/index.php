<?php

// Load controllers
require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Controllers/TaskController.php';

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Separar o caminho base dos parâmetros
if (strpos($uri, '?') !== false) {
    $uri = substr($uri, 0, strpos($uri, '?'));
}

// Route to appropriate controller and method
if ($uri === '') {
    // Home page
    $controller = new HomeController();
    $controller->index();
} elseif ($uri === 'tasks') {
    // Tasks list
    $controller = new TaskController();
    $controller->index();
} elseif ($uri === 'tasks/create') {
    // Create task
    $controller = new TaskController();
    $controller->create();
} elseif ($uri === 'tasks/update') {
    // Update task
    $controller = new TaskController();
    $controller->update();
} elseif ($uri === 'tasks/delete') {
    // Delete task
    $controller = new TaskController();
    $controller->delete();
} else {
    // 404 page
    header('HTTP/1.1 404 Not Found');
    echo '<h1>404 - Página Não Encontrada</h1>';
    echo '<p>A página que você está procurando não existe.</p>';
    echo '<p><a href="/">Voltar para a página inicial</a></p>';
}