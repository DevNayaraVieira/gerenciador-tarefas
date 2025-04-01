<?php

require_once __DIR__ . '/../Models/Task.php';

class TaskController {
    private $taskModel;
    
    public function __construct() {
        $this->taskModel = new Task();
    }
    
    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        
        // Capturar o conteúdo da view
        ob_start();
        require_once __DIR__ . '/../Views/tasks.php';
        $content = ob_get_clean();
        
        // Renderizar o layout com o conteúdo
        require_once __DIR__ . '/../Views/layout.php';
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'pending';
            
            if (empty($title)) {
                $error = "Título é obrigatório";
            } else {
                $this->taskModel->createTask($title, $description, $status);
                header('Location: /tasks');
                exit;
            }
        }
        
        // Se chegamos aqui, é uma solicitação GET ou houve um erro
        $tasks = $this->taskModel->getAllTasks();
        
        // Capturar o conteúdo da view
        ob_start();
        require_once __DIR__ . '/../Views/tasks.php';
        $content = ob_get_clean();
        
        // Renderizar o layout com o conteúdo
        require_once __DIR__ . '/../Views/layout.php';
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'pending';
            
            if (empty($title)) {
                $error = "Título é obrigatório";
            } else {
                $this->taskModel->updateTask($id, $title, $description, $status);
                header('Location: /tasks');
                exit;
            }
        }
        
        header('Location: /tasks');
        exit;
    }
    
    public function delete() {
        // Aceitar tanto POST quanto GET para exclusão
        $id = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        
        if ($id) {
            $this->taskModel->deleteTask($id);
        }
        
        header('Location: /tasks');
        exit;
    }
}