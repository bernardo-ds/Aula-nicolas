// Função para cadastrar um novo usuário
function cadastrar() {
  const nome = document.getElementById('nome')?.value.trim();
  const email = document.getElementById('email')?.value.trim();
  const senha = document.getElementById('senha')?.value.trim();

  if (!nome || !email || !senha) {
    alert('Preencha todos os campos!');
    return;
  }

  const usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

  // Verifica se o e-mail já existe
  if (usuarios.some(u => u.email === email)) {
    alert('Este e-mail já está cadastrado!');
    return;
  }

  usuarios.push({ nome, email, senha });
  localStorage.setItem('usuarios', JSON.stringify(usuarios));

  alert('Conta criada com sucesso!');
  window.location.href = 'cadastrar.html'; // vai para a página de sucesso
}

// Função para fazer login
function login() {
  const email = document.getElementById('email')?.value.trim();
  const senha = document.getElementById('senha')?.value.trim();

  const usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
  const usuario = usuarios.find(u => u.email === email && u.senha === senha);

  if (usuario) {
    alert(`Bem-vindo, ${usuario.nome}!`);
    localStorage.setItem('usuarioLogado', JSON.stringify(usuario));
    window.location.href = 'cadastrar.html'; // muda depois pra sua página inicial
  } else {
    alert('Email ou senha incorretos!');
  }
}

// Função para verificar se o usuário está logado
function verificarLogin() {
  const usuario = JSON.parse(localStorage.getItem('usuarioLogado'));
  if (!usuario) {
    alert('Você precisa estar logado para acessar esta página!');
    window.location.href = 'entrar.html';
  }
}

// Função para sair
function logout() {
  localStorage.removeItem('usuarioLogado');
  window.location.href = 'entrar.html';
}