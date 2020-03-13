        
<?php
if (isset($_POST["btnUpArquivo"])) {
    $objUpload = new Upload($_FILES['arquivoPdf'], 'arquivosPdf/');
    $arquivo = new Arquivo();
    $up = $objUpload->salvar();
    if ($up) {
        $arquivo->setLink($up);
        $arquivo->setDescricao($_POST['txtDescricao']);
        if ($arquivo->cadastrar()) {
            echo "<script>alert('Upload realizado com sucesso');</script>";
        } else {
            echo "<script>alert('Problema com Upload');</script>";
        }
    } else {
        echo "<script>alert('Não foi possível mover o arquivo');</script>";
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
        <h2>Realizar upload de arquivos</h2>                        
    </div>
</nav>
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"> 
    <h4>Arquivo</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
        <input type="file" class="form-control" name="arquivoPdf">                                        
    </div>
    <h4>Descrição</h4>
    <div style="margin-bottom: 25px" class="input-group">         
        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
        <input type="text" class="form-control" name="txtDescricao">                                        
    </div>     
    <div style="margin-bottom: 25px" class="input-group"> 
        <button type="submit" name="btnUpArquivo" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-saved"></span> Upload
        </button>
    </div>        
</form>

