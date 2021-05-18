
<?php
  include_once 'add/header.php';
  include '../db/db_connection.php'
?>
<div class="jumbotron text-center" style="background-color: #2d5e63; color: #FFFFFF;">
  <h1>Cadastros PetShop</h1>
  <p>Selecione uma tabela para atualizar os items.</p>
</div>

<div class="container">
  <div class="row" style="margin-top: 100px;">
  <br><br>
    <div class="col-sm-4" align="left">
      <p><a class="button" style="padding: 10% 30% 10% 30%; " href="clientes/index.php" target="_self">Clientes</a></p>
    </div>
    <div class="col-sm-4" align="center">
      <p><a class="button"  style="padding: 10% 30% 10% 30%;" href="pet/index.php" target="_self">Pets</a></p>
    </div>
    <div class="col-sm-4" align="right">
      <p><a class="button" style="padding: 10% 30% 10% 30%;" href="servico/index.php" target="_self">Serviços</a></p>
    </div>
  </div>
</div>
<br>
<div class="container">
<hr>
<br>
</div>
<br>
<div class="container" align="center">
      <p><a class="button" style="padding: 4% 10% 4% 10%;" href="procedure/index.php" target="_blank">Agendamentos do Dia</a></p>
    
</div>


<?php
  include_once 'includes/footer.php';
?>
