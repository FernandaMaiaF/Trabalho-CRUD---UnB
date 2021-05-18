<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/ProcedureController.php';

  $procedure = find_all($conn);
?>
<style>
  .btn-circle {
    background-color: #2d5e63;
    display:block;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    border: none;
  }
  .btn-circle-sec {
    background-color: #828785;
    display:block;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    border: none;
  }

  .btn-circle-denger {
    background-color: #d90f0f;
    display:block;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    border: none;
  }
</style>
<div class="jumbotron" style="background-color: #2d5e63; color: #FFFFFF;">
  <div class="container">
    <h1>Agendamentos do Dia</h1>
    <br>
    <a class="button" href="../menu.php" target="_self">Menu</a>
   
  </div>
</div>

<div class="container">
  <div class="col-sm-12">
    <div class="row" style="margin-top: 90px;">
      
      <br><br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Horario</th>
            <th scope="col">Servico</th>
            <th scope="col">Cliente</th>
            <th scope="col">Pet</th>
            <th scope="col">Metodo Pagamento</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php while($row = $procedure->fetch(PDO::FETCH_ASSOC) ): ?>
            
            <th class="col-xs-6"><?php echo $row["ID"]?> </th>
            <td class="col-xs-6"><?php echo $row["Horario"]?></td>
            <td class="col-xs-6"><?php echo $row["Servico"]?></td>
            <td class="col-xs-6"><?php echo $row["Cliente"]?></td>
            <td class="col-xs-6"><?php echo $row["Pet"]?></td>
            <td class="col-xs-6"><?php echo $row["Pagamento"]?></td>
            
          </tr>
            <?php endwhile;?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
  include_once '../add/footer.php';
?>
