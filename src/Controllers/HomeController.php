<?php

class HomeController {
    public function index() {
        // Capturar o conteúdo da view
        ob_start();
        require_once __DIR__ . '/../Views/home.php';
        $content = ob_get_clean();
        
        // Renderizar o layout com o conteúdo
        require_once __DIR__ . '/../Views/layout.php';
    }
}