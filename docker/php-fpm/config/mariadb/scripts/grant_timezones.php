<?php
$host = getenv('MARIADB_HOST');
$user = 'root';
$password = getenv('MARIADB_ROOT_PASSWORD');
$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "GRANT SELECT ON `mysql`.`time_zone_name` TO 'glpi'";
$conn->query($sql);

$conn->close();
?>
