document.addEventListener('DOMContentLoaded', function() {
    console.log('Script carregado com sucesso');
    
    // Funcionalidade de modal para edição de tarefa
    const modal = document.getElementById('editTaskModal');
    if (modal) {
        const closeBtn = modal.querySelector('.close');
        const editButtons = document.querySelectorAll('.btn-edit');
        const editForm = document.getElementById('editTaskForm');
        const editId = document.getElementById('edit-id');
        const editTitle = document.getElementById('edit-title');
        const editDescription = document.getElementById('edit-description');
        const editStatus = document.getElementById('edit-status');
        
        // Abrir modal quando o botão de edição é clicado
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                // Garante que o evento não se propague para outros elementos
                e.stopPropagation();
                
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const status = this.getAttribute('data-status');
                
                editId.value = id;
                editTitle.value = title;
                editDescription.value = description;
                editStatus.value = status;
                
                modal.style.display = 'block';
                document.body.classList.add('modal-open');
            });
        });
        
        // Fechar modal quando X é clicado
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.classList.remove('modal-open');
        });
        
        // Fechar modal quando clicar fora
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        });
        
        // Fechar modal quando ESC é pressionado
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && modal.style.display === 'block') {
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        });
    }
    
    // Confirmar antes de deletar
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            // Cancelar o envio do formulário para confirmação
            event.preventDefault();
            
            // Confirmar antes de excluir
            if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
                this.submit();
            }
        });
        
        // Certifique-se de que o botão não está sendo bloqueado
        const deleteButton = form.querySelector('.btn-delete');
        if (deleteButton) {
            deleteButton.addEventListener('click', function(e) {
                e.stopPropagation(); // Impedir propagação do evento
            });
        }
    });
    
    // Filtro de tarefas por status
    const filterButtons = document.querySelectorAll('.filter-btn');
    const taskCards = document.querySelectorAll('.task-card');
    
    if (filterButtons.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const status = this.getAttribute('data-status');
                
                // Ativar botão clicado
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Filtrar cartões
                taskCards.forEach(card => {
                    if (status === 'all' || card.classList.contains('status-' + status)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
    
    // Animação de rolagem suave
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
});