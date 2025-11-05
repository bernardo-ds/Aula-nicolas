function cadastrar(){
    // 1. Coletar todos os dados dos campos
    const nome = document.getElementById('nome')?.value;
    const usuario = document.getElementById('usuario')?.value; // CPF
    const dataNascimento = document.getElementById('dataNascimento')?.value;
    const telefone = document.getElementById('telefone')?.value;
    const senha = document.getElementById('senha')?.value;
    // VARIÁVEL 'confirmarSenha' REMOVIDA

    // 2. Validação de preenchimento (atualizada)
    if (!nome || !usuario || !dataNascimento || !telefone || !senha) {
        return alert("Por favor, preencha todos os campos.");
    }

    // 3. VALIDAÇÃO DE SENHA DUPLA REMOVIDA
    // if (senha !== confirmarSenha) { ... } foi removido.

    // 4. Validação de usuário existente
    if (localStorage.getItem(usuario)) {
        return alert("Este CPF (usuário) já está cadastrado.");
    }

    // 5. Criar o objeto do usuário (o "pacote")
    const dadosUsuario = {
        nome: nome,
        dataNascimento: dataNascimento,
        telefone: telefone,
        senha: senha 
    };

    // 6. Salvar o objeto como JSON string no localStorage
    localStorage.setItem(usuario, JSON.stringify(dadosUsuario));
    
    alert(`Usuário ${nome} cadastrado com sucesso!`);
    
    // Redireciona para a página de login após o cadastro
    window.location.href = "./entrar.html";
}

function login(){
    const usuario = document.getElementById('usuario')?.value; // CPF
    const senha = document.getElementById('senha')?.value;

    // 1. Validação de preenchimento
    if (!usuario || !senha) {
        return alert("Por favor, preencha o CPF e a Senha.");
    }

    // 2. Verificar se o usuário existe
    const dadosSalvos = localStorage.getItem(usuario); // Pega o "pacote" de dados
    if (!dadosSalvos) {
        return alert("Usuário (CPF) não encontrado!");
    }

    // 3. Converter o "pacote" (JSON string) de volta para objeto
    const dadosUsuario = JSON.parse(dadosSalvos);

    // 4. Comparar a senha digitada com a senha salva dentro do objeto
    if (senha === dadosUsuario.senha) {
        
        // Redireciona para a página inicial (home)
        window.location.href = "./inicial.html"; 
    } else {
        return alert("Senha incorreta.");
    }
}