<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/ClientesController.php';

  $id = $_GET['ID'];
  $row = find_one($id, $conn);
  if(isset($_POST['update'])){
    update($id, $conn);
  }
?>

<div class="jumbotron" style="background-color: #2d5e63; color: #FFFFFF;">
  <div class="container">
    <h1>Cadastro de Clientes</h1>
    <br>
    <a class="button" href="index.php" target="_self">Clientes</a>
  </div>
</div>

<div class="container">
    <div class="container" style="margin-top: 50;">
      <div class="column" style="position: relative;">
        <div class="row" style="margin-top: 90px;">
            <br><br>
            <form method="post">
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" required name="nome" value="<?php echo $row['Nome']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>CPF</label>
                  <input type="text" required name="cpf" value="<?php echo $row['CPF']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>data de Nascimento</label>
                  <input type="text" required name="nasc" value="<?php echo $row['Nascimento']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>Endereco</label>
                  <input type="text" required name="end" value="<?php echo $row['Endereco']; ?>" class="form-control" style="position: sticky; width: 600px;">
                
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
