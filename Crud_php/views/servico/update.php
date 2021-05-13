<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/ServicoController.php';

  $id = $_GET['ID'];
  $row = find_one($id, $conn);
  
  if(isset($_POST['update'])){
    update($tipo_produtos, $id, $conn);
  }
?>

<div class="jumbotron" style="background-color: #2d5e63; color: #FFFFFF;">
  <div class="container">
    <h1>Cadastro de Serviços</h1>
    <br>
    <a class="button" href="index.php" target="_self">Serviços</a>
  </div>
</div>

<div class="container">
    <div class="container" style="margin-top: 50;">
      <div class="column" style="position: relative;">
        <div class="row" style="margin-top: 90px;">
            <br><br>
            <form method="post">
                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" required name="tipo_produtos" value="<?php echo $row['Descricao']; ?>" class="form-control" style="position: sticky; width: 600px;">
                </div>
                <input type="submit" name="update" value="Atualizar" class="btn btn-success">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once '../add/footer.php';
?>
