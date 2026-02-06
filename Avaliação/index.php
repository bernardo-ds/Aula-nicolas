<?php

class Produto{ //class principal PRODUTO
    public $nome; // uma variavel nome publica
    public $valor; // uma variavel valor publica
    private $quantidadeEstoque; // uma variavel quantidadeEstoque que nenhuma outra class pode herdar ela

    function __construct($nome, $valor, $quantidadeEstoque){ //ela é execuntada automaticamente quando cria algum objeto
        $this->nome = $nome;      // nome recebido à propriedade do objeto
        $this->valor = $valor;  // valor recebido à propriedade do objeto
        $this->quantidadeEstoque = $quantidadeEstoque; // esta vendo se tem produto  em estoque
    }

    function retirarEstoque($quantidade){ //esta funcão ele é para fazer a renovação do estoque
        $this->quantidadeEstoque -= $quantidade;//aqui esta falando que quando algum cliente comprar algum produto ele remova do estoque
    }
}

abstract class Usuario{ // class para ser herdada
    public $nomeCompleto; // aqui esta o nome completo dos clientes em publico

    function __construct($nomeCompleto){ // uma nova função
        $this->nomeCompleto = $nomeCompleto; //server para exibir o nome completo das pessoas
    }

    abstract function percentualDesconto(); // class para ser herdada
}

class UsuarioPadrao extends Usuario{ //esta class é filha do pai usuario
    function percentualDesconto(){// este percentual de desconto é para quem é usuario padrao
        return 0; // aqui é o desconto
    }
}

class UsuarioVip extends Usuario{ //esta class é filha do pai usuario
    function percentualDesconto(){ // este percentual de desconto é para quem é usuario vip
        return 0.15; // aqui é o desconto
    }
}

class OrdemCompra{ // uma nova classe
    public $usuario; // dados do cliente publica
    public $itens; // lista de produtos publica
    public $situacao = "aberto"; // status inicial publica

    function __construct($usuario){ // inicializa o pedido
        $this->usuario = $usuario; // guarda o usuario
        $this->itens = []; // cria o carrinho vazio
    }

    function adicionarItem($item, $quantidade){ // coloca item no carrinho
        $this->itens[] = [$item, $quantidade]; // salva item e quantidade
        $item->retirarEstoque($quantidade); // atualiza o estoque
    }

    function concluirPedido(){ // encerra a compra
        $valorTotal = 0; // inicia o calculo

        echo "Cliente: {$this->usuario->nomeCompleto}<br>"; // mostra o nome
        echo "Produtos comprados:<br>"; // lista de itens

        foreach ($this->itens as $registro) { // percorre o carrinho
            $produto = $registro[0]; // pega o produto
            $quantidade = $registro[1]; // pega a quanttidade
            echo " {$produto->nome}: {$quantidade}<br>"; // mostra o nome
            echo "R$" .($produto->valor * $quantidade)."<br>"; // mostra o total
            $valorTotal += $produto->valor * $quantidade; // soma no total
        }

        $valorTotal -= $valorTotal * $this->usuario->percentualDesconto(); // tira o desconto
        $this->situacao = "pago"; // muda o status de aberto para pago

        echo "Valor final : R$ {$valorTotal}<br>"; // mostra o total
        echo "Status do pedido: {$this->situacao}<br><br>"; // mostra os status dos clientes falando se esta pago ou em aberto
    }
}
$notebook = new Produto("Notebook", 3500, 4); // cria o produto notebook
$fone = new Produto("Fone", 100, 12); // cria o produto fone
$celular = new Produto ("Celular", 3700, 9); // cria o produto celular

$nicolas = new UsuarioPadrao("Nicolas Marques (PADRAO)"); // mostrando que o nicolas é um cliente comum
$larissa = new UsuarioPadrao("Larissa Moreira (PADRAO)"); // mostrando que a larissa é um cliente comum
$ana = new UsuarioVip("Ana Souza (VIP)"); // mostrando que a ana é um cliente vip

$ordem1 = new OrdemCompra($nicolas); // abre o pedido do nicolas
$ordem1->adicionarItem($notebook, 2); // coloca 2 noteboks
$ordem1->adicionarItem($fone, 2); // coloca 2 fones
$ordem1->adicionarItem($celular, 1); // coloca 1 celular
$ordem1->concluirPedido(); // esta concluindo o pedido de nicolas

$ordem2 = new OrdemCompra($larissa); // abre o pedido da larissa
$ordem2->adicionarItem($notebook, 1); // coloca 1 notebooks
$ordem2->adicionarItem($fone, 1); // coloca 1 fone
$ordem2->adicionarItem($celular, 3); // coloca 3 celulares
$ordem2->concluirPedido(); // esta concluindo o pedido da larissa

$ordem3 = new OrdemCompra($ana); // abre o pedido da ana
$ordem3->adicionarItem($notebook, 3); // coloca 3 notebooks
$ordem3->adicionarItem($fone, 1); // coloca 1 fone
$ordem3->adicionarItem($celular, 1); // coloca 1 celular
$ordem3->concluirPedido(); // esta concluindo o pedido da ana

?>
