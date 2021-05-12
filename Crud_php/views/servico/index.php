<?php
  include_once '../includes/header.php';
  include '../../db/servicos_db.php';
  include '../../actions/ServicoController.php';

  $servicos = find_produtos($conn);
  
  
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
    <h1>Cadastro de Serviços</h1>
    <br>
    <a class="button" href="../menu.php" target="_blank">Menu</a>
    <div class="column" style="position: absolute; right: 22%;">
        <button class="btn" data-toggle="modal" data-target="#myModal">
          Novo Serviço
        </button>
    </div>
  </div>
</div>

<div class="container">
  <div class="col-sm-12">
    <div class="row" style="margin-top: 90px;">
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Cadastro de Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="../../actions/ServicoController.php">
                  <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" required name="servico" class="form-control">
                  </div>
                  <input type="submit" name="send" value="Salvar" class="btn btn-success">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
      
      
      <br><br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Descricao</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php while($row = $servicos->fetch(PDO::FETCH_ASSOC) ): ?>
            
            <th> <?php echo $row["ID"]?> </th>
            <td class="col-md-5"><?php echo $row["Descricao"]?></td>
            <td><a href="view.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-circle-sec"><i class="fa fa-eye" style="color:#FFFFFF"></i></button></a></td>
            <td><a href="update.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-circle"><i class="fa fa-pencil" style="color:#FFFFFF"></i> </button></a></td>
            <td><a href="../../actions/ServicoController.php?ID=<?php echo $row['ID'];?>&action=delete"><button class="btn btn-circle-denger"><i class="fa fa-trash" style="color:#FFFFFF"></i> </button></a></td>
            
          </tr>
            <?php endwhile;?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
  include_once '../includes/footer.php';
?>
