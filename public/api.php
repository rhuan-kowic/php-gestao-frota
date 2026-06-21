<?php

ini_set('display_errors', 0); 
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

require_once __DIR__ . '/../src/VehiclesController.php';

$controller = new VehiclesController();

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$input = json_decode(file_get_contents('php://input'), true) ?? [];

// 4. Roteamento
switch ($method) {
  case 'GET':
    if ($id) {
      echo $controller->show($id);
    } else {
      echo $controller->index();
    }
    break;

  case 'POST':
    $name = $input['name'] ?? '';
    $type = $input['type'] ?? '';
    $status = $input['status'] ?? '';

    echo $controller->create($name, $type, $status);
    break;

  case 'PUT':
  case 'PATCH':
    if ($id) {
      $status = $input['status'] ?? '';
      echo $controller->updateStatus($id, $status);
    } else {
      http_response_code(400);
      echo json_encode(["error" => "ID do veículo é obrigatório na URL para atualização."], JSON_UNESCAPED_UNICODE);
    }
    break;

  case 'DELETE':
    if ($id) {
      echo $controller->destroy($id);
    } else {
      http_response_code(400);
      echo json_encode(["error" => "ID do veículo é obrigatório na URL para exclusão."], JSON_UNESCAPED_UNICODE);
    }
    break;

  default:
    http_response_code(405);
    echo json_encode(["error" => "Método HTTP não suportado."], JSON_UNESCAPED_UNICODE);
    break;
}
