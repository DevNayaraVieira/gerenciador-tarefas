<?php
// Calculando a contagem de tarefas por status
$totalTasks = count($tasks ?? []);
$pendingCount = 0;
$inProgressCount = 0;
$completedCount = 0;

foreach ($tasks ?? [] as $task) {
    switch ($task['status']) {
        case 'pending':
            $pendingCount++;
            break;
        case 'in_progress':
            $inProgressCount++;
            break;
        case 'completed':
            $completedCount++;
            break;
    }
}
?>

<div class="page-header">
    <h1>Gerenciamento de Tarefas</h1>
    <p>Crie, visualize e gerencie suas tarefas de forma eficiente</p>
</div>

<?php if (isset($error)): ?>
    <div class="alert error">
        <i class="fas fa-exclamation-circle"></i>
        <?= $error ?>
    </div>
<?php endif; ?>

<div class="task-container">
    <div class="task-form-container">
        <h2><i class="fas fa-plus-circle"></i> Adicionar Nova Tarefa</h2>
        <form action="/tasks/create" method="POST" class="task-form">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" required placeholder="Digite o título da tarefa">
            </div>
            
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" rows="3" placeholder="Descreva detalhes sobre a tarefa"></textarea>
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="pending">Pendente</option>
                    <option value="in_progress">Em Andamento</option>
                    <option value="completed">Concluída</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Adicionar Tarefa
            </button>
        </form>
    </div>
    
    <div class="task-list-container">
        <h2><i class="fas fa-list"></i> Lista de Tarefas</h2>
        
        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <i class="fas fa-clipboard-list empty-icon"></i>
                <p>Nenhuma tarefa encontrada. Adicione sua primeira tarefa!</p>
            </div>
        <?php else: ?>
            <div class="status-filter">
                <button class="filter-btn active" data-status="all">
                    <i class="fas fa-tasks"></i> Todas <span class="count"><?= $totalTasks ?></span>
                </button>
                <button class="filter-btn" data-status="pending">
                    <i class="fas fa-clock"></i> Pendentes <span class="count"><?= $pendingCount ?></span>
                </button>
                <button class="filter-btn" data-status="in_progress">
                    <i class="fas fa-spinner"></i> Em Andamento <span class="count"><?= $inProgressCount ?></span>
                </button>
                <button class="filter-btn" data-status="completed">
                    <i class="fas fa-check"></i> Concluídas <span class="count"><?= $completedCount ?></span>
                </button>
            </div>
            
            <div class="tasks">
                <?php foreach ($tasks as $task): ?>
                    <div class="task-card status-<?= $task['status'] ?>">
                        <div class="task-header">
                            <h3><?= htmlspecialchars($task['title']) ?></h3>
                            <span class="task-status">
                                <?php 
                                    $statusLabel = '';
                                    $statusIcon = '';
                                    
                                    switch($task['status']) {
                                        case 'pending':
                                            $statusLabel = 'Pendente';
                                            $statusIcon = 'clock';
                                            break;
                                        case 'in_progress':
                                            $statusLabel = 'Em Andamento';
                                            $statusIcon = 'spinner';
                                            break;
                                        case 'completed':
                                            $statusLabel = 'Concluída';
                                            $statusIcon = 'check';
                                            break;
                                    }
                                ?>
                                <i class="fas fa-<?= $statusIcon ?>"></i>
                                <?= $statusLabel ?>
                            </span>
                        </div>
                        
                        <div class="task-body">
                            <p><?= htmlspecialchars($task['description']) ?></p>
                        </div>
                        
                        <div class="task-meta">
                            <span class="task-date">
                                <i class="far fa-calendar-alt"></i>
                                Criada em: <?= date('d/m/Y', strtotime($task['created_at'])) ?>
                            </span>
                        </div>
                        
                        <div class="action-buttons">
                            <!-- Link de Editar em vez de botão -->
                            <a href="#" 
                               onclick="editTask(<?= $task['id'] ?>, '<?= addslashes(htmlspecialchars($task['title'])) ?>', '<?= addslashes(htmlspecialchars($task['description'])) ?>', '<?= $task['status'] ?>'); return false;" 
                               class="btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            
                            <!-- Link de Excluir em vez de form -->
                            <a href="#" 
                               onclick="if(confirm('Tem certeza que deseja excluir esta tarefa?')) { window.location.href = '/tasks/delete?id=<?= $task['id'] ?>'; } return false;" 
                               class="btn-delete">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Modal de Edição (Oculto por padrão) -->
            <div id="editTaskModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2><i class="fas fa-edit"></i> Editar Tarefa</h2>
                    <form action="/tasks/update" method="POST" id="editTaskForm">
                        <input type="hidden" id="edit-id" name="id">
                        
                        <div class="form-group">
                            <label for="edit-title">Título</label>
                            <input type="text" id="edit-title" name="title" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit-description">Descrição</label>
                            <textarea id="edit-description" name="description" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit-status">Status</label>
                            <select id="edit-status" name="status">
                                <option value="pending">Pendente</option>
                                <option value="in_progress">Em Andamento</option>
                                <option value="completed">Concluída</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Atualizar Tarefa
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts inline para garantir funcionalidade -->
<script>
function editTask(id, title, description, status) {
    // Preencher formulário
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-title').value = title;
    document.getElementById('edit-description').value = description;
    document.getElementById('edit-status').value = status;
    
    // Mostrar modal
    document.getElementById('editTaskModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editTaskModal').style.display = 'none';
}

// Fechar modal ao clicar fora
window.onclick = function(event) {
    var modal = document.getElementById('editTaskModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Filtros de tarefas
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', function() {
        const status = this.getAttribute('data-status');
        
        // Ativar botão clicado
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        this.classList.add('active');
        
        // Filtrar cartões
        document.querySelectorAll('.task-card').forEach(card => {
            if (status === 'all' || card.classList.contains('status-' + status)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>