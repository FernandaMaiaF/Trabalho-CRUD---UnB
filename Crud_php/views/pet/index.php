<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/PetController.php';

  $pets = find_all($conn);
  
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
    <h1>Cadastro dos Pets</h1>
    <br>
    <a class="button" href="../menu.php" target="_self">Menu</a>
    <div class="column" style="position: absolute; right: 22%;">
        <button class="btn" data-toggle="modal" data-target="#myModal">
          Novo Pet
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
                <h5 class="modal-title" id="myModalLabel">Cadastro de Pet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="../../actions/PetController.php">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" required name="nome" class="form-control">
                    <br>
                    <label>Dono</label>
                    <input type="text" required name="dono"  class="form-control">
                    <br>
                    <label>Sexo</label>
                    <input type="text" required name="sexo"  class="form-control">
                    <br>
                    <label>Porte</label>
                    <input type="text" required name="porte"  class="form-control">
                    <br>
                    <label>Raça</label>
                    <input type="text" required name="raca"  class="form-control">
                
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
            <th scope="col">Nome</th>
            <th scope="col">Dono</th>
            <th scope="col">Sexo</th>
            <th scope="col">Porte</th>
            <th scope="col">Raça</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php while($row = $pets->fetch(PDO::FETCH_ASSOC) ): ?>
            
            <th class="col-xs-6"> <?php echo $row["ID"]?> </th>
            <td class="col-xs-6"><?php echo $row["Nome"]?></td>
            <td class="col-xs-6"><?php echo $row["Dono"]?></td>
            <td class="col-xs-6"><?php echo $row["Sexo"]?></td>
            <td class="col-xs-6"><?php echo $row["Porte"]?></td>
            <td class="col-xs-6"><?php echo $row["Raca"]?></td>
            <td><a href="view.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-circle-sec"><i class="fa fa-eye" style="color:#FFFFFF"></i></button></a></td>
            <td><a href="update.php?ID=<?php echo $row['ID'];?>"><button class="btn btn-circle"><i class="fa fa-pencil" style="color:#FFFFFF"></i> </button></a></td>
            <td><a href="../../actions/PetController.php?ID=<?php echo $row['ID'];?>&action=delete"><button class="btn btn-circle-denger"><i class="fa fa-trash" style="color:#FFFFFF"></i> </button></a></td>
            
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
