<?php
  include_once '../includes/header.php';
  include '../../db/servicos_db.php';

  $id = $_GET['ID'];
  $sql = "select * from tipo_produtos where ID= '$id'";
  $servicos = $conn->query($sql);
  $row = $servicos->fetch(PDO::FETCH_ASSOC);
// erroo
  if(isset($_POST['send'])){
    $tipo_produtos = $_POST['tipo_produtos'];
    var_dump($tipo_produtos);
    $sql = "update from tipo_produtos set name='$tipo_produtos'";
    $conn->query($sql);
    header('location: index.php');
  }
  

?>
<div class="container">
    <div class="container" style="margin-top: 100px;">
      <center><h1>Cadastro de Serviços</h1></center>
      <div class="column" style="position: relative;">
        <div class="row" style="margin-top: 90px;">
            <br><br>
            <form method="post" action="index.php">
                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" required name="tipo_produtos" value="<?php echo $row['Descricao']; ?>" class="form-control" style="position: sticky; width: 600px;">
                </div>
                <input type="submit" name="tipo_produtos" value="Salvar" class="btn btn-success">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once '../includes/footer.php';
?>
