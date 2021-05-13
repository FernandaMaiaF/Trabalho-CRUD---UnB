

<?php
  include '../.db/db_connection.php';

  if(!$conn) {
    echo "erro";
  } 
  $action = $_GET['action'];

  function find_all ($conn) {
    $sql = "select * from clientes";
    $clientes = $conn->query($sql);
    if ($clientes != TRUE) {
      echo "Error creating database: " . $conn->error;
    } else {
      return $clientes;
    }
  }

  function find_one($id, $conn){
    $sql = "select * from clientes where ID = '$id'";
    $clientes = $conn->query($sql);
    $row = $clientes->fetch(PDO::FETCH_ASSOC);
    
    return $row;  
  }


  function update ($id, $conn) {
    $nome = $_POST['nome'];
    $Nascimento = $_POST['nasc'];
    $Endereco = $_POST['end'];
    $CPF = $_POST['cpf'];

    $sql = "update clientes set 
    Nascimento = '$Nascimento',
    Nome = '$nome',
    Endereco = '$Endereco',
    CPF = '$CPF'
    where ID = '$id'";

    $val = $conn->query($sql);
    if($val){
      header('location: index.php');
    }
  }

  if (isset($_POST['send'])){

    $nome = $_POST['nome'];
    $Nascimento = $_POST['nasc'];
    $Endereco = $_POST['end'];
    $CPF = $_POST['cpf'];

    $sql = "insert into clientes (Nascimento, Nome, Endereco, CPF) values ('$Nascimento', '$nome', '$Endereco', '$CPF')";
    
    $val = $conn->query($sql);
    if($val) {
      header('location: ../views/clientes/index.php');
    }
  } 
  

  if ($action == 'delete'){
    $id = $_GET['ID'];
    $sql = "delete from clientes where ID = '$id'";
    $val = $conn->query($sql);

    if($val) {
      header('location: ../views/clientes/index.php');
    };
  }

?>