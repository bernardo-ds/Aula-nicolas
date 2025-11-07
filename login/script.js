function cadastrar(){

    const nome = document.getElementById('nome')?.value;
    const usuario = document.getElementById('usuario')?.value; // CPF
    const dataNascimento = document.getElementById('dataNascimento')?.value;
    const telefone = document.getElementById('telefone')?.value;
    const senha = document.getElementById('senha')?.value;

    if (!nome || !usuario || !dataNascimento || !telefone || !senha) {
        return alert("Por favor, preencha todos os campos.");
    }


    if (localStorage.getItem(usuario)) {
        return alert("Este CPF (usuário) já está cadastrado.");
    }

    const dadosUsuario = {
        nome: nome,
        dataNascimento: dataNascimento,
        telefone: telefone,
        senha: senha 
    };

    localStorage.setItem(usuario, JSON.stringify(dadosUsuario));
    
    alert(`Usuário ${nome} cadastrado com sucesso!`);
    

    window.location.href = "./entrar.html";
}

function login(){
    const usuario = document.getElementById('usuario')?.value; 
    const senha = document.getElementById('senha')?.value;


    if (!usuario || !senha) {
        return alert("Por favor, preencha o CPF e a Senha.");
    }


    const dadosSalvos = localStorage.getItem(usuario);
    if (!dadosSalvos) {
        return alert("Usuário (CPF) não encontrado!");
    }

    const dadosUsuario = JSON.parse(dadosSalvos);

    if (senha === dadosUsuario.senha) {
        

        window.location.href = "./inicial.html"; 
    } else {
        return alert("Senha incorreta.");
    }
}