<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: application/json');

require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

switch ($method) {
    case 'GET':
        switch($type) {
            case 'generation':
                generation($connect);
                break;
            case 'retrieve':
                if (isset($id)) {
                    retrieve($connect, $id);
                }
                break;
            default:
                http_response_code(404);
        }
        break;
}

