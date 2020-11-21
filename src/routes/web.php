<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app -> get('/api/countdowns', function (Request $request, Response $response) {
    
    $data = [
        [
            'id' => 1,
            'title' => 'Boda de Carlos',
            'date' => $this -> get('carbon')::now() -> toString()
        ],
        [
            'id' => 2,
            'title' => 'Cumple del Taru',
            'date' => $this -> get('carbon')::now() -> toString()
        ]
    ];

    $payload = json_encode($data);
    $response -> getBody() -> write($payload);
    
    return $response -> withHeader('Content-Type', 'application/json');
});

$app -> post('/api/countdowns', function(Request $request, Response $response) {

    $title = $request -> getParsedBody()['title'];
    $date = $request -> getParsedBody()['date'];

    var_dump($this -> get('db'));
    exit();

    if (strtotime($date) === FALSE) {
        return $response -> withStatus(400);
    }

    $payload = json_encode(['title' => $title, 'date' => $date]);
    $response -> getBody() -> write($payload);
    $response -> withStatus(200);
    $response -> withHeader('Content-Type', 'application/json');
    return $response;

});