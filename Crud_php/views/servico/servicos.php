<?php
  include_once '../includes/header.php';
  include '../../db/servicos_db.php';
?>
<div class="container">
  <div class="col-sm-12">
    <div class="row" style="margin-top: 100px;">
      <center><h1>Cadastro de Serviços</h1></center>
      <div class="column" style="position: absolute; right: 0;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Novo Serviço
        </button>
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
                <form method="post" action="../../actions/add_servico.php">
                  <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" required name="servico" class="form-control">
                  </div>
                  <input type="submit" name="send" value="Novo Servico" class="btn btn-success">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
      </div>
      
      
      <br><br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Descricao</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php while($row = $servicos->fetch(PDO::FETCH_ASSOC) ): ?>
            
            <th> <?php echo $row["ID"]?> </th>
            <td class="col-md-5"><?php echo $row["Descricao"]?></td>
            <td><a href="" class="btn btn-success">Editar</a></td>
            <td><a href="" class="btn btn-danger">Excluir</a></td>
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
