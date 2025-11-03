/*
 * =========================================
 * SCRIPT DE VALIDAÇÃO PROFISSIONAL
 * =========================================
 */

// Aguarda o DOM (a página) carregar completamente antes de executar o script
document.addEventListener("DOMContentLoaded", () => {
    
    // Tenta encontrar o formulário de login na página
    const loginForm = document.getElementById("login-form");
    
    // Tenta encontrar o formulário de cadastro na página
    const registerForm = document.getElementById("register-form");
    
    // Tenta encontrar o elemento de mensagem de erro
    const errorMessage = document.getElementById("error-message");

    // Função para exibir erros
    const showError = (message) => {
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.style.display = "block";
        }
    };

    // Função para limpar erros
    const clearError = () => {
        if (errorMessage) {
            errorMessage.textContent = "";
            errorMessage.style.display = "none";
        }
    };

    // Função para validar e-mail (expressão regular simples)
    const isValidEmail = (email) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(String(email).toLowerCase());
    };


    // =========================================
    // LÓGICA DO FORMULÁRIO DE LOGIN
    // =========================================
    if (loginForm) {
        loginForm.addEventListener("submit", (event) => {
            // Previne o envio padrão do formulário (que recarrega a página)
            event.preventDefault();
            clearError();

            // Pega os valores dos campos
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;

            // 1. Validação: Campos vazios
            if (email === "" || senha === "") {
                showError("Por favor, preencha todos os campos.");
                return;
            }

            // 2. Validação: E-mail válido
            if (!isValidEmail(email)) {
                showError("Por favor, insira um e-mail válido.");
                return;
            }

            // --- Lógica de Login (Simulação) ---
            // Aqui você faria a chamada para sua API ou banco de dados
            console.log("Tentativa de Login com:", { email, senha });

            // Simulação de sucesso:
            // (Em um app real, você receberia um token e redirecionaria)
            alert("Login bem-sucedido! (Simulação)");
            // window.location.href = "/dashboard.html"; // Redireciona para o painel principal
        });
    }


    // =========================================
    // LÓGICA DO FORMULÁRIO DE CADASTRO
    // =========================================
    if (registerForm) {
        registerForm.addEventListener("submit", (event) => {
            event.preventDefault();
            clearError();

            // Pega os valores dos campos
            const nome = document.getElementById("nome").value;
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;

            // 1. Validação: Campos vazios
            if (nome === "" || email === "" || senha === "") {
                showError("Por favor, preencha todos os campos.");
                return;
            }

            // 2. Validação: E-mail válido
            if (!isValidEmail(email)) {
                showError("Por favor, insira um e-mail válido.");
                return;
            }

            // 3. Validação: Senha forte (exemplo: mínimo 6 caracteres)
            if (senha.length < 6) {
                showError("A senha deve ter pelo menos 6 caracteres.");
                return;
            }

            // --- Lógica de Cadastro (Simulação) ---
            // Aqui você enviaria os dados para sua API
            console.log("Tentativa de Cadastro com:", { nome, email, senha });

            // Simulação de sucesso:
            // Redireciona para a página de sucesso
            window.location.href = "cadastrar.html";
        });
    }
});