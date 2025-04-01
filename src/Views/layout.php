<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    
    <!-- Favicon Corrigido -->
    <link rel="icon" href="/assets/img/verificar.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/img/verificar.ico" type="image/x-icon">    

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/advanced.css">
    <link rel="stylesheet" href="/assets/css/footer-fix.css">
    <link rel="stylesheet" href="/assets/css/buttons.css">
    
    <!-- Font Awesome via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Estilos para o botão de voltar ao portfólio */
        .portfolio-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--secondary-dark) 100%);
            color: white;
            border-radius: 8px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(107, 75, 221, 0.4);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            border: 2px solid rgba(255, 255, 255, 0.1);
            font-weight: 500;
            letter-spacing: 0.5px;
            backdrop-filter: blur(5px);
        }
        
        .portfolio-button span {
            margin-left: 10px;
            font-size: 0.95rem;
        }
        
        .portfolio-button::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--secondary-light), var(--secondary), var(--secondary-dark));
            z-index: -1;
            border-radius: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .portfolio-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 25px rgba(107, 75, 221, 0.6);
            background: linear-gradient(135deg, var(--secondary-light) 0%, var(--secondary) 100%);
        }
        
        .portfolio-button:hover::after {
            opacity: 1;
            animation: borderglow 1.5s linear infinite;
        }
        
        .portfolio-button i {
            font-size: 1.2rem;
            position: relative;
            transition: transform 0.3s ease;
        }
        
        .portfolio-button:hover i {
            transform: translateX(-3px);
        }
        
        @keyframes borderglow {
            0% {
                opacity: 0.5;
            }
            50% {
                opacity: 0.8;
            }
            100% {
                opacity: 0.5;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <i class="fas fa-tasks"></i>
                <span>Gerenciador de Tarefas</span>
            </div>
            <nav>
                <ul>
                    <li><a href="/"><i class="fas fa-home"></i> Início</a></li>
                    <li><a href="/tasks"><i class="fas fa-list-check"></i> Tarefas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <div class="container">
            <!-- O conteúdo será injetado aqui -->
            <?php if (isset($content)) echo $content; ?>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; <?= date('Y') ?> Gerenciador de Tarefas. Todos os direitos reservados <a href="https://portfolio-devnayaravieira.netlify.app" style="color: white; text-decoration: underline; font-weight: bold;" target="_blank">DevNayaraVieira</a>.</p>
            <div class="social-links">
                <a href="https://github.com/DevNayaraVieira" class="social-link" target="_blank" rel="noopener noreferrer"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/nayaravieira-pcd" class="social-link" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://wa.me/5515996855425?text=Ol%C3%A1!" class="social-link" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
    
    <!-- Botão de voltar ao portfólio -->
    <a href="https://portfolio-devnayaravieira.netlify.app" class="portfolio-button" title="Voltar ao Portfólio">
        <i class="fas fa-arrow-left"></i>
        <span>Voltar ao Portfólio</span>
    </a>
    
    <!-- JavaScript para funcionalidades -->
    <script src="/assets/js/main.js"></script>
</body>
</html>