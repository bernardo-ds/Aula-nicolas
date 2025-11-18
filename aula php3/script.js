// O nome do usuário será armazenado como parte do objeto de usuário no localStorage
// { "email@dominio.com": { nome: "Nome", senha: "senha" } }

/**
 * Realiza a validação, armazena no localStorage e dá feedback de sucesso.
 * Chamado pelo formulário de cadastro.
 * @returns {boolean} Sempre retorna false para impedir o envio real do formulário (que é desnecessário agora).
 */
function cadastrar(event) {
    event.preventDefault(); // Impede o envio do formulário padrão

    const form = event.target;
    const email = form.querySelector('[name="email"]').value.trim();
    const nome = form.querySelector('[name="nome"]').value.trim();
    const senha = form.querySelector('[name="password"]').value;
    const confirmarSenha = form.querySelector('[name="confirm_password"]').value;

    const errorMessageElement = document.getElementById('error-message');
    errorMessageElement.textContent = '';
    errorMessageElement.style.display = 'none';

    // --- Validação ---
    if (!email || !nome || !senha || !confirmarSenha) {
        errorMessageElement.textContent = "Por favor, preencha todos os campos.";
        errorMessageElement.style.display = 'block';
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (!emailRegex.test(email)) {
        errorMessageElement.textContent = "Por favor, insira um endereço de email válido.";
        errorMessageElement.style.display = 'block';
        return false;
    }

    if (senha !== confirmarSenha) {
        errorMessageElement.textContent = "As senhas não conferem!";
        errorMessageElement.style.display = 'block';
        return false;
    }

    // --- Simulação de Banco de Dados (localStorage) ---
    // Recupera todos os usuários
    const usuarios = JSON.parse(localStorage.getItem('usuarios')) || {};

    if (usuarios[email]) {
        errorMessageElement.textContent = "Este email já está cadastrado.";
        errorMessageElement.style.display = 'block';
        return false;
    }

    // Armazena o novo usuário
    usuarios[email] = {
        nome: nome,
        senha: senha // Em um ambiente real, esta senha seria hash
    };
    localStorage.setItem('usuarios', JSON.stringify(usuarios));

    // --- Feedback e Redirecionamento ---
    alert(`Usuário ${nome} cadastrado com sucesso!`);
    window.location.href = "entrar.html"; // Redireciona para a página de login
}

/**
 * Realiza a validação, verifica as credenciais no localStorage, dá feedback (com nome) e redireciona.
 * Chamado pelo formulário de login.
 * @returns {boolean} Sempre retorna false para impedir o envio real do formulário.
 */
function entrar(event) {
    event.preventDefault(); // Impede o envio do formulário padrão

    const form = event.target;
    const email = form.querySelector('[name="email"]').value.trim();
    const senha = form.querySelector('[name="password"]').value;

    const errorMessageElement = document.getElementById('error-message');
    errorMessageElement.textContent = '';
    errorMessageElement.style.display = 'none';

    // --- Validação ---
    if (!email || !senha) {
        errorMessageElement.textContent = "Por favor, preencha o email e a senha.";
        errorMessageElement.style.display = 'block';
        return false;
    }

    // --- Simulação de Banco de Dados (localStorage) ---
    const usuarios = JSON.parse(localStorage.getItem('usuarios')) || {};
    const usuarioExistente = usuarios[email];

    if (!usuarioExistente) {
        errorMessageElement.textContent = "Usuário não encontrado!";
        errorMessageElement.style.display = 'block';
        return false;
    }

    if (senha !== usuarioExistente.senha) {
        errorMessageElement.textContent = "Senha incorreta!";
        errorMessageElement.style.display = 'block';
        return false;
    }

    // --- Login bem-sucedido: Feedback (com nome!) e Redirecionamento ---
    // Armazena o usuário logado (simulação de sessão)
    localStorage.setItem('usuarioLogado', JSON.stringify(usuarioExistente));

    // Exibe o alert com o nome do usuário, conforme solicitado
    alert(`Bem-vindo(a) ${usuarioExistente.nome}!`);
    
    // Redireciona para o painel (simulação)
    window.location.href = "painel.php"; 
}

// Nota: As páginas HTML abaixo usarão o onsubmit="cadastrar(event)" ou onsubmit="entrar(event)"