<?php
$host = getenv('MARIADB_HOST');
$user = getenv('MARIADB_USER');
$password = getenv('MARIADB_PASSWORD');
$database = getenv('MARIADB_DATABASE');
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS `glpi_alerts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `items_id` int NOT NULL DEFAULT 0,
  `itemtype` varchar(100) NOT NULL,
  `type` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`itemtype`,`items_id`,`type`),
  KEY `date` (`date`),
  KEY `type` (`type`)
) COLLATE=utf8_unicode_ci";

$conn->query($sql);
$conn->close();
?>
