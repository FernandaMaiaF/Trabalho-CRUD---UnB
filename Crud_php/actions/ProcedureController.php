

<?php
  include '../.db/db_connection.php';

  if(!$conn) {
    echo "erro";
  } 
  $action = $_GET['action'];

  function find_all ($conn) {
    $sql = "select 
    a.ID, 
    a.Dia as Dia,
    a.Horario as Horario,
    serv.NomeServico as Servico,
    cli.Nome as Cliente,
    pet.Nome as Pet,
    pag.Descricao as Pagamento
    from agendamento a
    left join servico serv on a.IDServico = serv.ID
    left join clientes cli on a.IDDono = cli.ID
    left join pet pet on a.IDPet = pet.ID
    left join metodo_pagamento pag on a.IDMetodoPag = pag.ID
    where a.Dia = '2021-05-13'
    ";
    $row = $conn->query($sql);
    
    if ($row != TRUE) {
      echo "Error creating database: " . $conn->error;
    } else {
      return $row;
    }
  }


?>