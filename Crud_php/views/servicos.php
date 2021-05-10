<!DOCTYPE html>
<html lang="en">
<head>
  <title>Serviços</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>
  .btn-default {
  border-color: #dbdbdb;
  text-shadow: 0 1px 0 #fff;
  border-color: #ccc;
  margin-bottom: 2%;
}
</style>
<body>
<div class="container">
  <div class="col-sm-12">
    <div class="row" style="margin-top: 100px;">
      <center><h1>Cadastro de Serviços</h1></center>
      <div class="column" style="position: absolute; right: 0;">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Novo Serviço</button>
      </div>
      <br><br>
      <!-- Modal aqui -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Serviço
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal  -->
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td class="col-md-5">Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><a href="" class="btn btn-success">Editar</a></td>
            <td><a href="" class="btn btn-danger">Excluir</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</html>