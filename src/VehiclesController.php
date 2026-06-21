<?php
class VehiclesController
{
  private PDO $pdo;
  public function __construct()
  {
    $this->pdo = require("Conexao.php");
  }

  public function index()
  {
    header('Content-Type: application/json; charset=utf-8');
    try {
      $sql = "SELECT * FROM vehicles;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($result, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
      http_response_code(500);
      return json_encode(["error" => "Falha ao buscar veículos: " . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
  }

  public function show(int $id)
  {
    header('Content-Type: application/json; charset=utf-8');
    try {
      $sql = "SELECT * FROM vehicles WHERE id = :id;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(["id" => $id]);

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$result) {
        http_response_code(404);
        return json_encode(["error" => "Veículo não encontrado."], JSON_UNESCAPED_UNICODE);
      };

      return json_encode($result, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
      http_response_code(500);
      return json_encode(["error" => "Falha ao buscar o veículo: " . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
  }

  public function create(string $name, string $type, string $status)
  {
    try {
      if (empty($name) || empty($type) || empty($status)) {
        http_response_code(400);
        return json_encode(["error" => "Dados incompletos. 'name', 'type' e 'status' são obrigatórios"], JSON_UNESCAPED_UNICODE);
      };

      $sql = "INSERT INTO vehicles (name, type, status) VALUES (:name, :type, :status);";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(
        [
          'name' => trim($name),
          'type' => trim($type),
          'status' => trim($status)
        ]
      );

      http_response_code(201);
      return json_encode(["message" => "Veículo cadastrado com sucesso."], JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
      http_response_code(500);
      return json_encode(["error" => "Falha ao criar veículo: " . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
  }
};

