<?php
  
  include '../db/servicos_db.php';
$action = $_GET['action'];

if (isset($action) && $action == 'delete'){
  $id = $_GET['ID'];
  echo "foi";
  $sql = "delete from tipo_produtos where ID = '$id'";
  $val = $conn->query($sql);

  if($val) {
    header('location: ../views/servico/index.php');
  };
}
?>