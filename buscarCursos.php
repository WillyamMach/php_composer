<?php 

require 'vendor\autoload.php';
require 'src/Buscador.php';

use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;

$cliente = new Client(['base_uri' => 'https://cursos.alura.com.br', 'verify' => false]);
$crawler = new $crawler;

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/category/programacao#php');

foreach($cursos as $key) {
    echo $key;
    echo "<br>";
}