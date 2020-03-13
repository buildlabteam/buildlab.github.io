<?php
if (isset($_POST['btnEnviarMsg'])) {
    require_once './class/Funcoes.php';    
    $teste = enviar_email("contato@buildlab.com.br", $_POST['txtDestinatario'], $_POST['txtAssunto'], $_POST['txtTexto']);    
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
        <h2>Nova mensagem</h2>                      
    </div>
</nav>
<form class="form-horizontal" role="form" method="post">        
    <h4>Destinatário</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="txtDestinatario">                                        
    </div>
    <h4>Assunto</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
        <input type="text" class="form-control" name="txtAssunto">                                        
    </div>
    <h4>Mensagem</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
        <textarea class="form-control" id="textarea" name="txtTexto" rows="5"></textarea>                                       
    </div> 
    <div style="margin-bottom: 25px" class="input-group"> 
        <button type="submit" name="btnEnviarMsg" class="btn btn-primary">
            <span class="glyphicon glyphicon-send"></span> Enviar e-mail
        </button>
    </div>        
</form>
