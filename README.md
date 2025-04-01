# Simple PHP Fullstack Application

A minimalist fullstack application built with PHP, MariaDB, and Docker. This project implements a simple task management system with basic CRUD operations.

## Project Structure

```
simple-php-app/
├── docker/
│   ├── mariadb/
│   │   └── init.sql
│   └── php/
│       └── Dockerfile
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └── js/
│   │       └── main.js
│   └── .htaccess
├── src/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   └── TaskController.php
│   ├── Models/
│   │   └── Task.php
│   ├── Views/
│   │   ├── home.php
│   │   ├── tasks.php
│   │   └── layout.php
│   └── Database.php
├── docker-compose.yml
├── .env
└── README.md
```

## Technical Stack

- **PHP 8.1**: Backend programming language
- **MariaDB 10.6**: Relational database
- **Apache**: Web server with mod_rewrite
- **Docker**: Containerization

## Features

- Simple MVC architecture
- Task management (Create, Read, Update, Delete)
- Responsive design
- Docker containerization for easy setup

## Prerequisites

- Docker and Docker Compose installed
- Git (optional for cloning)

## Installation and Setup

1. Clone or download this repository:

```bash
git clone <repository-url>
cd simple-php-app
```

2. (Optional) Modify the `.env` file to set custom database credentials.

3. Start the Docker containers:

```bash
docker-compose up -d
```

4. Access the application:
   - Open your browser and navigate to [http://localhost:8080](http://localhost:8080)

## Usage

- Navigate to the home page to see the application overview
- Click on "Tasks" to manage your tasks
- Add new tasks using the form
- Edit or delete existing tasks

## Customization

- **Styling**: Modify `public/assets/css/style.css` to change the appearance
- **Database**: Edit `docker/mariadb/init.sql` to modify the database schema
- **Logic**: Update the controllers and models in the `src` directory

## Troubleshooting

- If you encounter permission issues, run:
  ```bash
  docker-compose exec php chown -R www-data:www-data /var/www/html
  ```

- To view logs:
  ```bash
  docker-compose logs php
  ```

## License

This project is available under the MIT License.

## Author

Your Name

---

This project is created as a simple example of a PHP fullstack application. It's meant for educational purposes and as a starting point for more complex applications.