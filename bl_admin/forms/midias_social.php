<?php
if (isset($_POST['btnSalvar'])) {
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $teste = Conexao::Inserir("CALL midia_social_addValores($facebook, $instagram);");
    if ($teste) {
        echo "<script>alert('Valores salvos com sucesso');</script>";
    }
}
$result = Conexao::Consultar("CALL midia_social_consultar();")[0];
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
        <h2>Mídias sociais</h2>                        
    </div>
</nav>
<form class="form-horizontal" role="form" method="post">
    <h4>Facebook</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
        <input type="number" class="form-control" name="facebook" value="<?php echo $result['facebook']; ?>">                                        
    </div>
    <h4>Instagram</h4>
    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
        <input type="number" class="form-control" name="instagram" value="<?php echo $result['instagram']; ?>">
    </div>
    <div class="col-md-12 controls">
        <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-primary"/>
    </div>
    
</form>


