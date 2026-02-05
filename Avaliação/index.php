<?php

class Produto {
    public $nome;
    public $valor;
    private $quantidadeEstoque;

    function __construct($nome, $valor, $quantidadeEstoque) {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    function retirarEstoque($quantidade) {
        $this->quantidadeEstoque -= $quantidade;
    }
}

abstract class Usuario {
    public $nomeCompleto;

    function __construct($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    abstract function percentualDesconto();
}

class UsuarioPadrao extends Usuario {
    function percentualDesconto() {
        return 0;
    }
}

class UsuarioVip extends Usuario {
    function percentualDesconto() {
        return 0.15;
    }
}

class OrdemCompra {
    public $usuario;
    public $itens;
    public $situacao = "aberto";

    function __construct($usuario) {
        $this->usuario = $usuario;
    }

    function adicionarItem($item, $quantidade) {
        $this->itens[] = [$item, $quantidade];
        $item->retirarEstoque($quantidade);
    }
}
?>