<?php

abstract class Carro
{
    protected string $marca;
    protected string $nome;
    protected string $modelo;
    protected int $velocidade = 0;

    public function __construct(string $marca, string $nome, string $modelo)
    {
        $this->marca  = $marca;
        $this->nome   = $nome;
        $this->modelo = $modelo;
    }

    abstract public function tipo(): string;

    public function andar(): void
    {
        $this->velocidade += 140;
        echo "{$this->nome} está andando a {$this->velocidade} km/h<br>";
    }

    public function virar(string $lado): void
    {
        echo "{$this->nome} virou para a {$lado}<br>";
    }

    public function frear(): void
    {
        $this->velocidade = 0;
        echo "{$this->nome} freou e parou<br>";
    }

    public function info(): void
    {
        echo "Marca: {$this->marca}<br>";
        echo "Nome: {$this->nome}<br>";
        echo "Modelo: {$this->modelo}<br>";
        echo "Tipo: {$this->tipo()}<br><br>";
    }
}

class CarroPasseio extends Carro
{

    public function tipo(): string
    {
        return "Carro de Passeio";
    }
}

class CarroRapido extends Carro
{

    public function tipo(): string
    {
        return "Carro Rápido";
    }

    public function andar(): void
    {
        $this->velocidade += 250;
        echo "{$this->nome} acelerou forte! {$this->velocidade} km/h<br>";
    }
}

$jettaGLI = new CarroPasseio("Volkswagen", "Jetta GLI", "2020");
$unoDeEscada = new CarroRapido("Fiat", "Uno de Escada", "1999");

$jettaGLI->info();
$jettaGLI->andar();
$jettaGLI->virar("esquerda");
$jettaGLI->frear();

echo "<hr>";

$unoDeEscada->info();
$unoDeEscada->andar();
$unoDeEscada->virar("direita");
$unoDeEscada->frear();

echo "<hr>";
abstract class Animal
{
    protected string $especie;
    protected string $nome;
    protected int $velocidade = 0;

    public function __construct(string $especie, string $nome)
    {
        $this->especie = $especie;
        $this->nome = $nome;
    }

    abstract public function tipo(): string;

    public function andar(): void
    {
        $this->velocidade += 5;
        echo "{$this->nome} está andando a {$this->velocidade} km/h<br>";
    }

    public function virar(string $lado): void
    {
        echo "{$this->nome} virou para a {$lado}<br>";
    }

    public function parar(): void
    {
        $this->velocidade = 0;
        echo "{$this->nome} parou<br>";
    }

    public function info(): void
    {
        echo "Espécie: {$this->especie}<br>";
        echo "Nome: {$this->nome}<br>";
        echo "Tipo: {$this->tipo()}<br>";
    }
}

class AnimalCalmo extends Animal
{
    public function tipo(): string
    {
        return "Animal Calmo";
    }
}

class AnimalRapido extends Animal
{
    public function tipo(): string
    {
        return "Animal Rápido";
    }

    public function andar(): void
    {
        $this->velocidade += 20;
        echo "{$this->nome} correu muito rápido! {$this->velocidade} km/h<br>";
    }
}

$taturana = new AnimalCalmo("Inseto", "Taturana");
$hiena = new AnimalRapido("Mamífero", "Hiena");

$taturana->info();
$taturana->andar();
$taturana->virar("esquerda");
$taturana->parar();

echo "<hr>";

$hiena->info();
$hiena->andar();
$hiena->virar("direita");
$hiena->parar();



abstract class Filme {
    protected string $genero;
    protected string $nome;
    protected float $ano;

    public function __construct(string $genero, string $nome, float $ano) {
        $this->genero = $genero;
        $this->nome = $nome;
        $this->ano = $ano;
    }

    abstract public function tipo(): string;

    public function assistir(): void {
        echo "O filme '{$this->nome}' está sendo assistido<br>";
    }

    public function pausar(): void {
        echo "O filme '{$this->nome}' foi pausado<br>";
    }

    public function info(): void {
        echo "Nome: {$this->nome}<br>";
        echo "Gênero: {$this->genero}<br>";
        echo "Ano: {$this->ano}<br>";
        echo "Tipo: {$this->tipo()}<br><br>";
    }
}

class FilmeAcao extends Filme {
    public function tipo(): string {
        return "Filme de Ação";
    }

    public function assistir(): void {
        echo "O filme '{$this->nome}' está cheio de cenas emocionantes! <br>";
    }
}

class FilmeDrama extends Filme {
    public function tipo(): string {
        return "Filme de Drama";
    }

    public function assistir(): void {
        echo "O filme '{$this->nome}' emociona e faz refletir! <br>";
    }
}

$homemAranha = new FilmeAcao("Ficção Científica", "Homem-Aranha", 2020);
$batman = new FilmeAcao("Ação", "Batman", 2022);
$umSonhoDeLiberdade = new FilmeDrama("Drama", "Um Sonho de Liberdade", 1994);

echo "<hr>";

$homemAranha->info();
$homemAranha->assistir();
$homemAranha->pausar();

echo "<hr>";

$batman->info();
$batman->assistir();
$batman->pausar();

echo "<hr>";

$umSonhoDeLiberdade->info();
$umSonhoDeLiberdade->assistir();
$umSonhoDeLiberdade->pausar();

?>
