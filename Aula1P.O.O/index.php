<?php

    class Automovel{
        public $modelo;
        public $ano;
        public $motor;

        function __construct(string $modelo, float $ano, string $motor)
        {
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->motor = $motor;
        }

        function dirigir(){
            echo "{$this->modelo} ta andando <br>";
        }
        function virar(){
            echo "{$this->modelo} ta virando <br>";
        }
        function tras(){
            echo "{$this->modelo} ta indo para trás <br> <br> <br>";
        }
    }


    $Jetta_GLI = new Automovel("Jetta GLI", 2022, "Abg23");

    $Jetta_GLI->dirigir();
    $Jetta_GLI->virar();
    $Jetta_GLI->tras();


    $XJ6 = new Automovel("XJ6", 2015, "Abg24");
    
    $XJ6->dirigir();
    $XJ6->virar();
    $XJ6->tras();
    $ONIBUS = new Automovel("ONIBUS", 2002, "Abg25");
    
    $ONIBUS->dirigir();
    $ONIBUS->virar();
    $ONIBUS->tras();

    class Animal{
        public $especie;
        public $idade;
        public $peso;

        function __construct(string $especie, float $idade, float $peso)
        {
            $this->especie = $especie;
            $this->idade = $idade;
            $this->peso = $peso;
        }
        function andar(){
            echo "{$this->especie} esta andando <br>";
        }
        function correndo(){
            echo "{$this->especie} esta correndo <br>";
        }
        function comendo(){
            echo "{$this->especie} esta comendo <br> <br> <br>";
        }
    }

    $Vaca = new Animal("Vaca", 12, 120);

    $Vaca->andar();
    $Vaca->correndo();
    $Vaca->comendo();

    $cachorro = new Animal("cachorro", 10, 23);

    $cachorro->andar();
    $cachorro->correndo();
    $cachorro->comendo();

    $passaro = new Animal("passaro", 4, 2);

    $passaro->andar();
    $passaro->correndo();
    $passaro->comendo();

    class Filme{
        public $genero;
        public $ano;
        public $nome;

        function __construct(string $genero, float $ano, string $nome)
        {
            $this->genero = $genero;
            $this->ano = $ano;
            $this->nome = $nome;
        }
        function filme(){
            echo "O filme {$this->nome} esta sendo assistido <br>";
        }
    }

    $homem_aranha =  new Filme("ficção cientifica", 2020, "homem aranha");
    $homem_aranha->filme();

    $Batman =  new Filme("ação", 2022, "Batman");
    $Batman->filme();

    $Um_Sonho_de_Liberdade =  new Filme("Drama", 2022, "Um Sonho de Liberdade");
    $Um_Sonho_de_Liberdade->filme();

