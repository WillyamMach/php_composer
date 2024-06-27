<?php 
namespace Alura\BuscadorDeCursos;
use \GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador { 
    private $httpClient;
    private $crawler;
    public function __construct(ClientInterface $httpClient, Crawler $crawler) {
        $this->crawler = $crawler;
        $this->httpClient = $httpClient;
    }

    public function buscar(string $url): array {
        $response = $this->httpClient->request('GET', 'https://cursos.alura.com.br/category/programacao#php');

        $html = $response->getBody();
        $crawler = new Crawler();
        
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}