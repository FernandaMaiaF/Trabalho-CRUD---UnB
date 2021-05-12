

<?php
  include '../db/servicos_db.php';

  if(!$conn) {
    echo "erro";
  } 
  $action = $_GET['action'];

  if (isset($_POST['send'])){

    $Descricao = $_POST['servico'];
    $sql = "insert into tipo_produtos (Descricao) values ('$Descricao')";
    
    $val = $conn->query($sql);
    if($val) {
      header('location: ../views/servico/index.php');
    }
  } 
  

  if ($action == 'delete'){
    $id = $_GET['ID'];
    echo "foi";
    $sql = "delete from tipo_produtos where ID = '$id'";
    $val = $conn->query($sql);

    if($val) {
      header('location: ../views/servico/index.php');
    };
  }

?>