<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "includes/db.php"; // <-- make sure this sets up $pdo (PDO connection)

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id   = $_POST["id"] ?? null;
    $type = $_POST["type"] ?? null;
    $newPrice = $_POST["newPrice"] ?? null;

    if (!$id || !$type || !$newPrice) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    // choose table based on type
    $table = null;
    if ($type === "tour") {
        $table = "tours";
    } elseif ($type === "safari") {
        $table = "safaris";
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid type"]);
        exit;
    }

    try {
        $stmt = $pdo->prepare("UPDATE $table SET price = ? WHERE id = ?");
        $success = $stmt->execute([$newPrice, $id]);

        if ($success && $stmt->rowCount() > 0) {
            echo json_encode([
                "status" => "success",
                "newPrice" => $newPrice
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "No row updated (check ID)"
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
    exit;
}

echo json_encode(["status" => "error", "message" => "Invalid request"]);