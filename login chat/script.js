function cadastrar() {
    const nome = document.getElementById('nome').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;

    if (!nome || !senha || !confirmarSenha) {
        return alert("Por favor, preencha todos os campos.");
    }

    if (senha !== confirmarSenha) {
        return alert("As senhas não conferem!");
    }

    if (localStorage.getItem(nome)) {
        return alert("Este usuário já está cadastrado.");
    }

    localStorage.setItem(nome, senha);
    return alert(`Usuário ${nome} cadastrado com sucesso!`);
}

function entrar() {

    const nome = document.getElementById('nome').value; 
    const senha = document.getElementById('senha').value;

    let usuarioExistente = localStorage.getItem(nome);

    if (!usuarioExistente) {
        return alert("Usuário não existe!!!");
    }

    if (nome && senha === usuarioExistente) {
        alert(`Usuário ${nome} logado com sucesso!`);
        window.location.href = "./cadastro.html"; 
    } else {
        return alert("Usuário e/ou senha incorretos");
    }
}