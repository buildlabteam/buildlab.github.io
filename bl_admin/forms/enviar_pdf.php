<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="navbar-btn navbar-btn-1">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <h2>Enviar E-book para todos os clientes</h2>                        
    </div>
</nav>
<table class="table table-striped" width="100%">
  <thead>
    <tr>
        <th scope="col" width="3%"></th>
        <th scope="col" width="10%">Visualizar</th>
        <th scope="col" width="67%">Descrição</th>
        <th scope="col" width="15%">Data postagem</th>    
    </tr>
  </thead>
  <tbody> 
      <?php
        if(isset($_POST['btnEnviar'])){
            $c = new Cliente();
            $listaClientes;
            $result = $c->cosultarTodos();
            if($result){
                foreach ($result as $value) {
                    $listaClientes .= $value['email'].',';
                }
            }
            $listaClientes = substr($listaClientes, 0, strlen($listaClientes)-1);
            enviar_email("contato@buildlab.com.br", $listaClientes, "Esperamos que goste do nosso E-book", 'http://www.buildlab.com.br/bl_admin/'.$_POST['link']);
            //echo 'http://www.buildlab.com.br/bl_admin/'.$_POST['link'];
            //http://www.buildlab.com.br/bl_admin/
        }
        $arquivo = new Arquivo();
        $result = $arquivo->cosultar();
        if($result){
            foreach ($result as $value) {
                $data = $value['data_public'];
                $data = substr($data, 8, 2) . '<small>/</small>' . substr($data, 5, 2) . '<small>/</small>' . substr($data, 0, 4) . ' ' . substr($data, 11, 5);
                echo '<tr>
                        <td>
                            <form method="post">
                                <input type="hidden" name="link" value="'.$value['link'].'"/>
                                <button type="submit" name="btnEnviar" class="btn btn-primary btn-block">
                                    <span class="glyphicon glyphicon-send"></span>
                                </button>
                            </form>
                        </td>
                        <td><a href="'.$value['link'].'"><span class="glyphicon glyphicon-zoom-in" style="font-size:1.8em;"></span></a></td>
                        <td>'.$value['descricao'].'</td>
                        <td>'.$data.'</td>
                    </tr>';
            }
        }
    ?> 
  </tbody>  
</table>