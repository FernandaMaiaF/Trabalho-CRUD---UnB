<?php
// Check connection
$servername = "localhost";
$username = "root";
$password = "fe1411";
$dbname = "bd_petshop";
  try { 
    $conn = new PDO("mysql:host=localhost;dbname=bd_petshop", 'root', 'fe1411');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  //---------------------------------------

  $sql = "select * from tipo_produtos";
  $servicos = $conn->query($sql);
  if ($servicos != TRUE) {
    echo "Error creating database: " . $conn->error;
  }
  
?>
