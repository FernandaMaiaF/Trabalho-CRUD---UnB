<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/PetController.php';

  $id = $_GET['ID'];
  $row = find_one($id, $conn);
  if(isset($_POST['update'])){
    update($id, $conn);
  }
  $sexos = get_sexos($conn);
?>

<div class="jumbotron" style="background-color: #2d5e63; color: #FFFFFF;">
  <div class="container">
    <h1>Cadastro de Pets</h1>
    <br>
    <a class="button" href="index.php" target="_self">Pets</a>
  </div>
</div>

<div class="container">
    <div class="container" style="margin-top: 50;">
      <div class="column" style="position: relative;">
        <div class="row" style="margin-top: 90px;">
            <br><br>
            <form method="post">
                <div class="form-group">
                  <label>Nome Pet</label>
                  <input type="text" required name="nome" value="<?php echo $row['Nome']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>Nome Dono</label>
                  <input type="text" required name="dono" value="<?php echo $row['Dono']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>Sexo</label>
                  <input type="text" required name="sexo" value="<?php echo $row['Sexo']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
                  <label>Porte</label>
                  <input type="text" required name="porte" value="<?php echo $row['Porte']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  </div>
                  <br>
                  <label>Raça</label>
                  <input type="text" required name="raca" value="<?php echo $row['Raca']; ?>" class="form-control" style="position: sticky; width: 600px;">
                  <br>
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

