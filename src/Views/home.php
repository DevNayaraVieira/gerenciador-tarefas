<?php 
// Forçar o layout a incluir este conteúdo como parte do "main"
?>

<div class="hero-container">
    <div class="hero">
        <h1>Bem-vindo ao Gerenciador de Tarefas</h1>
        <p>Uma aplicação fullstack PHP com MariaDB e Docker para organizar suas tarefas diárias</p>
        <div class="hero-buttons">
            <a href="/tasks" class="btn btn-primary"><i class="fas fa-list-check"></i> Ver Tarefas</a>
            <a href="#recursos" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Saiba Mais</a>
        </div>
    </div>
</div>

<section id="recursos" class="features">
    <div class="section-title">
        <h2>Recursos da Aplicação</h2>
        <p>Conheça as tecnologias que usamos para criar esta aplicação</p>
    </div>
    
    <div class="feature-cards">
        <div class="feature">
            <div class="feature-icon">
                <i class="fab fa-php"></i>
            </div>
            <h3>PHP</h3>
            <p>Construído com PHP 8.1 seguindo um padrão simples de MVC</p>
        </div>
        
        <div class="feature">
            <div class="feature-icon">
                <i class="fas fa-database"></i>
            </div>
            <h3>MariaDB</h3>
            <p>Utilizando MariaDB para armazenamento de dados confiável</p>
        </div>
        
        <div class="feature">
            <div class="feature-icon">
                <i class="fab fa-docker"></i>
            </div>
            <h3>Docker</h3>
            <p>Conteinerizado para facilitar a configuração e implantação</p>
        </div>
    </div>
</section>

<section class="getting-started">
    <div class="section-title">
        <h2>Como Começar</h2>
        <p>Siga estes passos para trabalhar com a aplicação</p>
    </div>
    
    <div class="steps">
        <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
                <h3>Clone o repositório</h3>
                <p>Primeiro, obtenha o código-fonte em sua máquina local</p>
            </div>
        </div>
        
        <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
                <h3>Execute os contêineres</h3>
                <p>Use o comando <code>docker-compose up -d</code> para iniciar a aplicação</p>
            </div>
        </div>
        
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
                <h3>Acesse a aplicação</h3>
                <p>Visite <a href="http://localhost:8081">http://localhost:8081</a> no seu navegador</p>
            </div>
        </div>
    </div>
</section>