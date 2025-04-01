-- Create tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert some initial tasks
INSERT INTO tasks (title, description, status) VALUES
('Implement user authentication', 'Add login and registration functionality', 'pending'),
('Design database schema', 'Create tables and relationships', 'completed'),
('Develop REST API', 'Create endpoints for CRUD operations', 'in_progress');