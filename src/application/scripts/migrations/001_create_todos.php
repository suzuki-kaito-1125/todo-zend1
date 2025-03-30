<?php
// Composer のオートローダーを読み込む
require_once __DIR__ . '/../../../../vendor/autoload.php';

require_once dirname(__FILE__) . '/../../../public/index.php';

$db = Zend_Db_Table::getDefaultAdapter();

$sql = "CREATE TABLE IF NOT EXISTS todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  completed BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  completed_at TIMESTAMP NULL DEFAULT NULL
)";

try {
  $db->query("SET NAMES utf8mb4");
  $db->query($sql);
  echo "Table `todos` created successfully.\n";
} catch (Exception $e) {
  echo "Error creating table: " . $e->getMessage() . "\n";
}
