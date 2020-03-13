<?php
$mensagem = new Mensagem();
$cliente = new Cliente();
$mensagem->setId($_GET['visualizar_msg']);
$mensagem->cosultarPorId();
if (isset($_POST['btnApagar'])) {
    if($mensagem->getMarcador() == 3){
        $mensagem->excluir();
    } else {
        $mensagem->setMarcador(3);
        $mensagem->alterarVisualizacaoMarcador();
    }    
    echo '<script>location.replace("?mensagens=' . $_POST['visualizada'] . '");</script>';
}
$marc = new Marcador();
$marc->setId($mensagem->getMarcador());
$marc->consultarPorId();
$vis = $marc->getNome();
if ($mensagem->getMarcador() == 1) {
    $mensagem->setMarcador(2);
    $mensagem->alterarVisualizacaoMarcador();
}
if(isset($_POST['btnMoverPara'])){
    $mensagem->setMarcador($_POST['moverPara']);
    $mensagem->alterarVisualizacaoMarcador();
}

$cliente->setEmail($mensagem->getCliente());
$cliente->consultarPorEmail();

if (isset($_POST['btnEnviarMsg'])) {
    require_once './class/Funcoes.php';
    $teste = enviar_email("contato@buildlab.com.br", $cliente->getEmail(), $_POST['txtAssunto'], $_POST['txtTexto']);
    if ($teste) {
        echo '<script>alert("Mensagem enviada com sucesso!!!");</script>';
    } else {
        echo '<script>alert("Mensagem não pode ser enviada!!!");</script>';
    }
}
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
        <div class="row">
            <div class="col-md-6">
                <h2>Visualizar mensagem</h2>                
            </div>

            <div class="col-md-5">
                <form method="post" class="navbar-right" style="margin: 14px auto 0px;">
                    <input type="hidden" name="visualizada" value="<?php echo $vis; ?>" />            
                    <button type="submit" name="btnApagar" class="btn btn-danger btn-block">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><button class="btn btn btn-primary btn-block"><span class="glyphicon glyphicon-folder-open" style="margin-right: 8px;"></button></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <form class="form-horizontal" role="form" method="post">                                               
                                        <h5>Mover para</h5>
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <?php
                                                $marcador = new Marcador();
                                                $resultado = $marcador->consultarTodos0();
                                                if ($resultado) {
                                                    foreach ($resultado as $value) {
                                                        echo '<div class="radio">
                                                                <label><input type="radio" name="moverPara" value="' . $value['id'] . '">' . $value['nome'] . '</label>
                                                              </div>';
                                                    }
                                                }
                                            ?>                                                                                                        
                                        </div>     
                                        <div style="margin-bottom: 25px" class="input-group">                                            
                                            <button type="submit" name="btnMoverPara" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-floppy-disk"></span>
                                            </button>
                                        </div>        
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>                 
            </div>
        </div>   
    </div>
</nav>
<form class="form-horizontal" role="form" method="post">
    <?php
    $data = $mensagem->getData();
    $data = substr($data, 8, 2) . '<small>/</small>' . substr($data, 5, 2) . '<small>/</small>' . substr($data, 0, 4) . ' ' . substr($data, 11, 5);
    ?>
    <h4><strong>Assunto: </strong> <?php echo retornar_aspas($mensagem->getAssunto()); ?></h4>
    <h4><strong>Data: </strong><?php echo $data; ?></h4>
    <h4><strong>Cliente: </strong><?php echo $cliente->getNome(); ?></h4>
    <h4><strong>E-mail: </strong><?php echo $cliente->getEmail(); ?></h4>
    <hr />

    <h4>Mensagem</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
        <textarea class="form-control" rows="<?php echo(strlen($mensagem->getTexto()) / 90); ?>" disabled>
            <?php echo retornar_aspas($mensagem->getTexto()); ?>
        </textarea>                                       
    </div>


    <h4>Assunto</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
        <input type="text" class="form-control" name="txtAssunto" value="<?php echo retornar_aspas($mensagem->getAssunto()); ?>">                                        
    </div>
    <h4>Responder</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-share-alt"></i></span>
        <textarea class="form-control" id="textarea" name="txtTexto" rows="5"></textarea>                                       
    </div> 
    <div style="margin-bottom: 25px" class="input-group"> 
        <button type="submit"  name="btnEnviarMsg" class="btn btn-primary">
            <!-- Pode ocorrer um erro aqui--><span class="glyphicon glyphicon-send"></span> Enviar e-mail 
        </button>
    </div>        
</form>
