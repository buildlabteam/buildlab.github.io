<?php
    require_once 'class/Cliente.php';
    require_once 'class/Mensagem.php';
    require_once 'class/Funcoes.php';
    if (isset($_POST['btnSolicitarEbook'])) {
        extract(filter_input_array(INPUT_POST, FILTER_DEFAULT), EXTR_OVERWRITE);
        $cliente = new Cliente();
        $cliente->setEmail($txtEmail);
        $cliente->setNome($txtNome);
        if(!$cliente->consultarPorEmail()){
            if($cliente->cadastrar()){
                echo '<script>alert("Seu e-mail foi cadastrado com sucesso");</script>';
            } else {
                echo '<script>alert("Cadastro não pode ser concluido!!!");</script>';
            }
        }else{
            echo '<script>alert("Seu e-mail já está cadastrado");</script>';
        }               
    }
    if (isset($_POST['btnEnviarMsg'])) {
        extract(filter_input_array(INPUT_POST, FILTER_DEFAULT), EXTR_OVERWRITE);
        $texto = limpar_aspas($txtTexto);
        $assunto = limpar_aspas($txtAssunto);
        $cliente = new Cliente();
        $cliente->setEmail($txtEmail);
        $cliente->setNome($txtNome);        
        $mensagem = new Mensagem();
        if(!$cliente->consultarPorEmail()){
            if($cliente->cadastrar()){
                $mensagem->setCliente($txtEmail);
                $mensagem->setTexto($texto);
                $mensagem->setAssunto($assunto);
                if($mensagem->cadastrar()){
                    echo '<script>alert("Mensagem enviada com sucesso!!!");</script>';
                }else {
                    echo '<script>alert("Não cadastrou");</script>';
                }
                
            } else {
                echo '<script>alert("Cadastro não pode ser concluido!!!");</script>';
            }
        }else{
            $mensagem->setCliente($txtEmail);
            $mensagem->setTexto($texto);
            $mensagem->setAssunto($assunto);
            if($mensagem->cadastrar()){
                echo '<script>alert("Mensagem enviada com sucesso!!!");</script>';
            }else {
                echo '<script>alert("Não cadastrou");</script>';
        }
    }               
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <a href="index.php">Área admin</a>
        <hr />
        <fieldset>
            <legend>Informar e-mail para receber E-book</legend>
            <form method="post">
                <label for="">E-mail</label>
                <input type="email" name="txtEmail" required="" />
                <br />
                <label for="">Gostaria de ser chamado de</label>
                <input type="text" name="txtNome" />
                <br />
                <input type="submit" name="btnSolicitarEbook" value="Solicitar E-book"/>
            </form>
        </fieldset>
        <hr />
        <fieldset>
            <legend>Fale Conosco</legend>
            <form method="post">
                <label for="">E-mail</label>
                <input type="email" name="txtEmail" required="" />
                <br />
                <label for="">Nome</label>
                <input type="text" name="txtNome" />
                <br />
                <label for="">Assunto</label>
                <input type="text" name="txtAssunto" />
                <br />
                Mensagem
                <br />
                <textarea name="txtTexto"></textarea>
                <br />
                <input type="submit" name="btnEnviarMsg" value="Enviar msg" />
            </form>
        </fieldset>
        <!-- Consultando midias sociais -->
        <?php            
            require_once 'class/Conexao.php';
            $result = Conexao::Consultar("CALL midia_social_consultar();")[0];
        ?>
        <h2>Curtidas Facebook: <?php echo $result['facebook']; ?></h2>
        <h2>Curtidas Instagram: <?php echo $result['instagram']; ?></h2>
    </body>
</html>
