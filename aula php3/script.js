function cadastrar() {
    const email = document.getElementById('nome').value; 
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;

    if (!email || !senha || !confirmarSenha) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (!emailRegex.test(email)) {
        alert("Por favor, insira um endereço de email válido (ex: seu.nome@dominio.com).");
        return;
    }

    if (senha !== confirmarSenha) {
        alert("As senhas não conferem!");
        return;
    }

    if (localStorage.getItem(email)) {
        alert("Este email já está cadastrado.");
        return;
    }

    localStorage.setItem(email, senha);
    alert(`Usuário ${email} cadastrado com sucesso!`);
    

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