<?php

declare(strict_types=1);

try {
    $lines = file('../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        [$key, $value] = explode("=", $line, 2);
        $_ENV[trim($key)] = trim($value);
    };

    $pdo = new PDO(
        "mysql:host={$_ENV['HOST']};dbname={$_ENV['DBNAME']};charset=utf8mb4",
        $_ENV["USER"],
        $_ENV["PASSWORD"]
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

return $pdo;
