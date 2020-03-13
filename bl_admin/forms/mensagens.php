<?php
    //require_once '../../class/Mensagem.php';
    $msg = new Mensagem();
    $marc = new Marcador();
    $label = "Novas";
    if(isset($_GET['mensagens'])){
        $marc->setNome($_GET['mensagens']);
        $marc->consultarPorNome();
        $marc = $marc->getId();
        $label = $_GET['mensagens'];
    }else{
        $marc = 1;
    }
        
    $msg->setMarcador($marc);
    $result = $msg->cosultarPorMarcador();
    /*if (@$_GET['mensagens'] == 'lidas') {
        $label = "Mensagens lidas";
        $result = $msg->cosultarLidas();
    } else {
        $label = "Novas mensagens";
        $result = $msg->cosultarNaoLidas();
    }*/
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
        <h2><?php echo $label;?></h2>                        
    </div>
</nav>
<table class="table table-striped" width="100%">
  <thead>
    <tr>
        <th scope="col" width="3%">Ver</th>
        <th scope="col" width="20%">Cliente</th>
        <th scope="col" width="67%">Mensagem</th>
        <th scope="col" width="10%">Data</th>    
    </tr>
  </thead>
  <tbody> 
      <?php
        if ($result) {
            foreach ($result as $mensagem) {
                $data = substr($mensagem['data'], 8,2).'/'.substr($mensagem['data'], 5,2).' - '. substr($mensagem['data'], 11,5);
                echo '<tr>
                        <th scope="row"><a href="?visualizar_msg=' . $mensagem['id'] . '"><span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span></a></th>
                        <td>' . substr($mensagem['nome'],0,26) . '</td>
                        <td><strong>' . retornar_aspas(substr($mensagem['assunto'], 0, 50)) . '</strong> - ' . retornar_aspas(substr($mensagem['texto'],0,30)) . '</td>
                        <td>' . $data. '</td>
                    </tr>';
            }
        } else {

            echo '<tr >
                        <td colspan="5">Está caixa de mensagem está vazia</td>
                    </tr> ';
        }
    ?> 
  </tbody>
</table>