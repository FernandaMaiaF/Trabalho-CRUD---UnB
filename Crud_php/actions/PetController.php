
<?php
  include '../.db/db_connection.php';

  
  if(!$conn) {
    echo "erro";
  } 
  $action = $_GET['action'];

  function find_all ($conn) {
    $sql = "select 
    p.ID, 
    p.Nome,
    dono.Nome as Dono,
    sexo.Descricao as Sexo,
    porte.Descricao as Porte,
    raca.Descricao as Raca
    from pet p
    left join clientes dono on p.IDono = dono.ID
    left join sexo_pet sexo on p.IDSexo = sexo.ID
    left join porte_pet porte on p.IDPorte = porte.ID
    left join raca_pet raca on p.IDRaca = raca.ID
    ";
    $pets = $conn->query($sql);
    if ($pets != TRUE) {
      echo "Error creating database: " . $conn->error;
    } else {
      return $pets;
    }
  }

  function find_one($id, $conn){
    $sql = "select 
    p.ID, 
    p.Nome,
    dono.Nome as Dono,
    sexo.Descricao as Sexo,
    porte.Descricao as Porte,
    raca.Descricao as Raca
    from pet p
    left join clientes dono on p.IDono = dono.ID
    left join sexo_pet sexo on p.IDSexo = sexo.ID
    left join porte_pet porte on p.IDPorte = porte.ID
    left join raca_pet raca on p.IDRaca = raca.ID
    where p.ID = '$id'
    ";
    $pets = $conn->query($sql);
    $row = $pets->fetch(PDO::FETCH_ASSOC);
    
    return $row;  
  }


  function update ($id, $conn) {
    $nome = $_POST['nome'];
    $dono = $_POST['dono'];
    $sexo = $_POST['sexo'];
    $porte = $_POST['porte'];
    $raca = $_POST['raca'];

    $sql_dono = "select ID from clientes where Nome = '$dono'";
    $novoDono = ($conn->query($sql_dono))->fetch(PDO::FETCH_ASSOC);
    if (empty($novoDono)) {
      echo "Não existe cliente com esse nome";
      $novoDono = "select IDono from pet where ID = '$id'";
      $novoDono = $conn->query($sql_dono);
    }
    $sql_sexo = "select ID from sexo_pet where Descricao = '$sexo'";
    $IDsexo = ($conn->query($sql_sexo))->fetch(PDO::FETCH_ASSOC);

    $sql_porte= "select ID from porte_pet where Descricao = '$porte'";
    $IDporte = ($conn->query($sql_porte))->fetch(PDO::FETCH_ASSOC);
    
    $sql_raca= "select ID from raca_pet where Descricao = '$raca'";
    $IDraca = ($conn->query($sql_raca))->fetch(PDO::FETCH_ASSOC);

    $dono = $novoDono['ID'];
    $sexo = $IDsexo['ID'];
    $porte = $IDporte['ID'];
    $raca = $IDraca['ID'];

    $sql = "update pet set 
    Nome = '$nome',
    IDono = '$dono',
    IDSexo = '$sexo',
    IDPorte = '$porte',
    IDRaca = '$raca'
    where ID = '$id'";

    $val = $conn->query($sql);
    var_dump($val);
    if($val){
      header('location: index.php');
    }
  }

  if (isset($_POST['send'])){

    $nome = $_POST['nome'];
    $dono = $_POST['dono'];
    $sexo = $_POST['sexo'];
    $porte = $_POST['porte'];
    $raca = $_POST['raca'];
    
    $sql_dono = "select ID from clientes where Nome = '$dono'";
    $IDdono = ($conn->query($sql_dono))->fetch(PDO::FETCH_ASSOC);
    
    $sql_sexo = "select ID from sexo_pet where Descricao = '$sexo'";
    $IDsexo = ($conn->query($sql_sexo))->fetch(PDO::FETCH_ASSOC);

    $sql_porte= "select ID from porte_pet where Descricao = '$porte'";
    $IDporte = ($conn->query($sql_porte))->fetch(PDO::FETCH_ASSOC);
    
    $sql_raca= "select ID from raca_pet where Descricao = '$raca'";
    $IDraca = ($conn->query($sql_raca))->fetch(PDO::FETCH_ASSOC);

    $dono = $IDdono['ID'];
    $sexo = $IDsexo['ID'];
    $porte = $IDporte['ID'];
    $raca = $IDraca['ID'];
    $sql = "insert into pet (IDono, Nome, IDSexo, IDPorte, IDRaca) values ('$dono', '$nome', '$sexo', '$porte', '$raca')";
    
    $val = $conn->query($sql);
    if($val) {
      header('location: ../views/pet/index.php');
    } else {
      var_dump("Verifique se os dados inseridos estão de acordo com a tabela de Dono, Sexo, Porte e Tipo de Animal");
      echo "Verifique se os dados inseridos estão de acordo com a tabela de Dono, Sexo, Porte e Tipo de Animal";
      
    }
    var_dump("Verifique se os dados inseridos estão de acordo com a tabela de Dono, Sexo, Porte e Tipo de Animal");
    echo "Verifique se os dados inseridos estão de acordo com a tabela de Dono, Sexo, Porte e Tipo de Animal";
      
  } 
  

  if ($action == 'delete'){
    $id = $_GET['ID'];
    $sql = "delete from pet where ID = '$id'";
    $val = $conn->query($sql);
    if($val) {
      header('location: ../views/pet/index.php');
    };
  }

  function get_sexos($conn) {
    $sql = "select * from sexo_pet";
    $sexo = $conn->query($sql);
    if ($sexo != TRUE) {
      echo "Error creating database: " . $conn->error;
    } else {
      return $sexo;
    }
  }

?>