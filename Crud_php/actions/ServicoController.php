

<?php
  include '../.db/db_connection.php';

  if(!$conn) {
    echo "erro";
  } 
  $action = $_GET['action'];

  function find_produtos ($conn) {
    $sql = "select * from tipo_produtos";
    $servicos = $conn->query($sql);
    if ($servicos != TRUE) {
      echo "Error creating database: " . $conn->error;
    } else {
      return $servicos;
    }
  }

  function find_one($id, $conn){
    $sql = "select * from tipo_produtos where ID = '$id'";
    $servicos = $conn->query($sql);
    $row = $servicos->fetch(PDO::FETCH_ASSOC);
    
    return $row;  
  }


  function update ($novo_nome, $id, $conn) {
    $tipo_produtos = $_POST['tipo_produtos'];
    $sql = "update tipo_produtos set Descricao = '$tipo_produtos' where ID = '$id'";
    $val = $conn->query($sql);
    if($val){
      header('location: index.php');
    }
  }

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
    $sql = "delete from tipo_produtos where ID = '$id'";
    $val = $conn->query($sql);

    if($val) {
      header('location: ../views/servico/index.php');
    };
  }

?>