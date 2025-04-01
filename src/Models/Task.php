<?php

require_once __DIR__ . '/../Database.php';

class Task {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getAllTasks() {
        return $this->db->fetchAll("SELECT * FROM tasks ORDER BY created_at DESC");
    }
    
    public function getTaskById($id) {
        return $this->db->fetch("SELECT * FROM tasks WHERE id = ?", [$id]);
    }
    
    public function createTask($title, $description, $status = 'pending') {
        $sql = "INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)";
        $this->db->query($sql, [$title, $description, $status]);
        return $this->db->getConnection()->lastInsertId();
    }
    
    public function updateTask($id, $title, $description, $status) {
        $sql = "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?";
        return $this->db->query($sql, [$title, $description, $status, $id])->rowCount();
    }
    
    public function deleteTask($id) {
        return $this->db->query("DELETE FROM tasks WHERE id = ?", [$id])->rowCount();
    }
    
    public function getTasksByStatus($status) {
        return $this->db->fetchAll("SELECT * FROM tasks WHERE status = ? ORDER BY created_at DESC", [$status]);
    }
}