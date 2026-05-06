<?php
function Pontos()
{
    for ($i = 0; $i < 4; $i++) {
        echo "->";
        sleep(1);
    }
}
class pokemon
{
    public $nome;
    public $tipo;
    public $nivel;
    public $xp;
    public $vida;
    public $ataque;
    public $defesa;
    public $velocidade;
    public $statusTotal;

    function batalhar($pokemons)
    {
        $resposta = readline("Com qual Pokémon você deseja batalhar?(1/2): ");
        switch ($resposta) {
            case '1':
                print "Você escolheu o " . $pokemons[0]->nome . "\n";
                $pokemon_batalha = $pokemons[0]->statusTotal;
                break;

            case '2':
                print "Você escolheu o " . $pokemons[1]->nome . "\n";
                $pokemon_batalha = $pokemons[1]->statusTotal;
                break;
            default:
                print "Pokemon inexistente";
        }
        if ($pokemon_batalha > 21) {
            $chance = 70;
        } else {
            $chance = 30;
        }

        $sorte = rand(1, 100);

        return $sorte <= $chance;
    }
    function UparXp($pokemons)
    {
        $Xp = rand(0, 10);
        if ($Xp > 2) {
            $pokemons[0]->nivel += 1;
            $pokemons[0]->vida += 5;
            $pokemons[0]->ataque += 5;
            $pokemons[0]->defesa += 5;
            $pokemons[0]->velocidade += 5;
            $pokemons[1]->nivel += 1;
            $pokemons[1]->vida += 5;
            $pokemons[1]->ataque += 5;
            $pokemons[1]->defesa += 5;
            $pokemons[1]->velocidade += 5;
            echo "Sua Xp obtida da batalha foi $Xp \n";
            echo "Seus Pokemons subiram de nível!!! \n";
        } else {
            echo "Sua Xp obtida da batalha foi $Xp \n";
            echo "Seu Pokemon não subiu de nível\n";
        }
    }
    function exibirInfo($pokemons)
    {
        echo "\n--Estatísticas dos seus Pokémons-- \n";
        echo $pokemons[0]->nome . ":\n";
        echo "Tipo -> " . $pokemons[0]->tipo . "\n";
        echo "Nível -> " . $pokemons[0]->nivel . "\n";
        echo "Vida -> " . $pokemons[0]->vida . "\n";
        echo "Ataque -> " . $pokemons[0]->ataque . "\n";
        echo "Defesa -> " . $pokemons[0]->defesa . "\n";
        echo "Velocidade -> " . $pokemons[0]->velocidade . "\n";

        echo "\n" . $pokemons[1]->nome . ":\n";
        echo "Tipo -> " . $pokemons[1]->tipo . "\n";
        echo "Nível -> " . $pokemons[1]->nivel . "\n";
        echo "Vida -> " . $pokemons[1]->vida . "\n";
        echo "Ataque -> " . $pokemons[1]->ataque . "\n";
        echo "Defesa -> " . $pokemons[1]->defesa . "\n";
        echo "Velocidade -> " . $pokemons[1]->velocidade . "\n";
        echo "\n";
    }
    function gerarStars($pokemon)
    {
        $pokemon->nivel = rand(1, 5);
        $pokemon->vida = rand(1, 4) * $pokemon->nivel;
        $pokemon->ataque = rand(1, 2) * $pokemon->nivel;
        $pokemon->defesa = rand(1, 2) * $pokemon->nivel;
        $pokemon->velocidade = rand(1, 2) * $pokemon->nivel;
        $pokemon->statusTotal = $pokemon->vida + $pokemon->ataque + $pokemon->defesa + $pokemon->velocidade;
    }
}
$pokemons = [];
$repete = true;
while ($repete) {

    $resposta = readline("Você deseja escolher os Pokémons predefinidos(1) ou passar Pokémons novos(2): ");

    if ($resposta == 1) {
        echo "1 -> Pikachu e Charizard \n";
        echo "2 -> Greninja e Dragonite \n";
        echo "3 -> Squirtle e Bulbasaur \n";
        echo "4 -> Mew e Mewtwo \n";
        echo "--Escolha sua dupla--";
        $resposta = readline("-> ");
        switch ($resposta) {
            case '1':
                $pokemon = new pokemon();
                $pokemon->nome = "Pikachu";
                $pokemon->tipo = "Eletrico";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);

                $pokemon = new pokemon();
                $pokemon->nome = "Charizard";
                $pokemon->tipo = "Fogo / Voador";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);
                break;

            case '2':
                $pokemon = new pokemon();
                $pokemon->nome = "Greninja";
                $pokemon->tipo = "Água / Sombrio";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);

                $pokemon = new pokemon();
                $pokemon->nome = "Dragonite";
                $pokemon->tipo = "Dragão / Voador";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);
                break;

            case '3':

                $pokemon = new pokemon();
                $pokemon->nome = "Squirtle";
                $pokemon->tipo = "Água";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);

                $pokemon = new pokemon();
                $pokemon->nome = "Bulbasur";
                $pokemon->tipo = "Planta / Venenoso";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);
                break;
            case '4':

                $pokemon = new pokemon();
                $pokemon->nome = "Mewto";
                $pokemon->tipo = "Psíquico";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);

                $pokemon = new pokemon();
                $pokemon->nome = "Mew";
                $pokemon->tipo = "Psíquico";
                $pokemon->gerarStars($pokemon);
                array_push($pokemons, $pokemon);
                break;
            default:
                echo "Opção indispónivel";
        }
        $repete = false;
    } else if ($resposta == 2) {
        for ($i = 0; $i < 2; $i++) {

            $pokemon = new pokemon();
            $pokemon->nome = readline("Informe o nome do Pokémon: ");
            $pokemon->tipo = readline("Informe o tipo do Pokémon: ");
            $pokemon->nivel = rand(1, 5);
            $pokemon->vida = rand(1, 4) * $pokemon->nivel;
            $pokemon->ataque = rand(1, 2) * $pokemon->nivel;
            $pokemon->defesa = rand(1, 2) * $pokemon->nivel;
            $pokemon->velocidade = rand(1, 2) * $pokemon->nivel;
            $pokemon->statusTotal = $pokemon->vida + $pokemon->ataque + $pokemon->defesa + $pokemon->velocidade;

            array_push($pokemons, $pokemon);
        }
    } else {
        echo "valor inválido\n";
        $repete = true;
    }
}

$pokemons[0]->exibirInfo($pokemons);
$resultado = $pokemons[0]->batalhar($pokemons);
if ($resultado) {
    echo "Aguardando fim da batalha \n";
    Pontos();
    echo "\n Seus Pokémons ganharam a batalha!!! \n ";
    $pokemons[0]->UparXp($pokemons);
} else {
    echo "Aguardando fim da batalha \n";
    Pontos();
    echo "\n Seus Pokémons foram derrotados na batalha \n";
}
Pontos();
$pokemons[0]->exibirInfo($pokemons);
