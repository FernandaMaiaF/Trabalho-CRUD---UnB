<?php
  include '../db/servicos_db.php';

  if(!$conn) {
    echo "erro";
  } 

  if (isset($_POST['send'])){

    $Descricao = $_POST['servico'];
    $sql = "insert into tipo_produtos (Descricao) values ('$Descricao')";
    
    $val = $conn->query($sql);
    if($val) {
      header('location: ../views/servico/index.php');
    }
  } 

?>