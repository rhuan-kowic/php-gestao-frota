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
      return json_encode(["error" => "Falha ao buscar veículos: " . $e->getMessage()]);
    }
  }
};


