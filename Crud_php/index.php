<style>
a.button {
  position: relative;
  background-color: #4d4d4d;
  border: none;
  font-size: 20px;
  color: #FFFFFF;
  padding: 10px;
  text-align: center;
  border-radius: 10px;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #f1f1f1;
  color: #FFFFFF;
  display: block;
  position: absolute;
  padding-top: 10%;
  padding-left: 20%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

</style>

<?php
  include_once 'includes/header.php';
?>
<div class="jumbotron text-center">
  <h1>Cadastros PetShop</h1>
  <p>Selecione a tabela para atualizar os items.</p>
</div>

<div class="container">
  <div class="row">
  <br><br>
    <div class="col-sm-4" align="left">
      <p><a class="button" href="views/servicos.php" target="_blank">Serviços</a></p>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4" align="center">
      <p><a class="button" href="Political/Thread/thread_insert.php" target="_blank">Produtos</a></p>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4" align="right">
      <p><a class="button" href="Political/Thread/thread_insert.php" target="_blank">Funcionários</a></p>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
</div>
<div class="container">
<hr>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4" align="left">
      <h3>Serviços</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4" align="center">
      <h3>Produtos</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4" align="right">
      <h3>Funcionarios</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
</div>
<?php
  include_once 'includes/footer.php';
?>
