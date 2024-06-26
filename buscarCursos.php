<?php 

require 'vendor\autoload.php';

use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client();

$response = $cliente->request('GET', 'https://cursos.alura.com.br/category/programacao#php');

$html = $response->getBody();

$crawler = new Crawler($html);
$cursos = $crawler->filter('li.card-list__item');

foreach($cursos as $key) {
    echo $key->textContent;
    echo "<br>";
}