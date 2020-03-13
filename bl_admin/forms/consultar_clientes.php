<?php
    $clientes = new Cliente();
    $result = $clientes->cosultarTodos();
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="navbar-btn navbar-btn-1">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <h2>Total de clientes: <?php echo count($result);?></h2>                        
    </div>
</nav>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">E-mail</th>
        <th scope="col">Nome</th>  
    </tr>
  </thead>
  <tbody>      
      <?php 
        if ($result) {
            foreach ($result as $cliente) {
                echo '<tr>
                        <td>' . $cliente['email']. '</td>
                        <td>' . $cliente['nome']. '</td>
                    </tr>';
            }
        } 
    ?> 
  </tbody>
</table>