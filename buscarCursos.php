<?php 

use \GuzzleHttp\Client;

$cliente = new Client();

$response = $client->request(method: 'GET', 'https://cursos.alura.com.br/category/programacao#php');

$html = $response->getBody();
