<?php
  include_once '../add/header.php';
  include '../../.db/db_connection.php';
  include '../../actions/PetController.php';

  $id = $_GET['ID'];
  $row = find_one($id, $conn);
  
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
    <h1>Pet</h1>
    <br>
    <a class="button" href="index.php" target="_self">Pets</a>
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
            <th scope="col"> <?php echo $row["ID"]?> </th>
          </tr>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col"><?php echo $row["Nome"]?></th>
          </tr><tr>
            <th scope="col">Dono</th>
            <th scope="col"> <?php echo $row["Dono"]?> </th>
          </tr>
          <tr>
            <th scope="col">Sexo</th>
            <th scope="col"><?php echo $row["Sexo"]?></th>
          </tr>
          <tr>
            <th scope="col">Porte</th>
            <th scope="col"><?php echo $row["Porte"]?></th>
          </tr>
          <tr>
            <th scope="col">Raça</th>
            <th scope="col"><?php echo $row["Raca"]?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<?php
  include_once '../add/footer.php';
?>
