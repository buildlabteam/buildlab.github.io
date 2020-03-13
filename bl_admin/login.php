<?php
    require_once 'config.php';
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BuildLab - Em busca do novo!</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/reset-particles.css">
    <link rel="stylesheet" type="text/css" href="css/particles.css">
</head>

                
<body id="tela-login">

    <div class="container-fluid panel">
        <div class="row-fluid">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <center><h1>Conecte-se ao nosso mundo!</h1></center>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <form method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="txtLogin" class="control-label">Usuário</label>
                        <input type="text" class="form-control" name="txtLogin">
                    </div>
                    <div class="form-group">
                        <label for="txtSenha" class="control-label">Senha</label>
                        <input type="password" class="form-control" name="txtSenha">
                    </div>	
                    <div class="form-group">
                        <input class="btn btn-default btn-lg" type="submit" value="Conectar" name="btnLogar">
                    </div>
                </form>
                <?php
                    $baseLogin = array("buildlabteam","123456"); 
                    if(isset($_POST['btnLogar']))
                    {
                        $admin = array($_POST['txtLogin'],$_POST['txtSenha']);              
                        if($baseLogin[0] == $admin[0] && $baseLogin[1] == $admin[1]){
                            $_SESSION['logado'] = serialize($admin);
                            echo '<script>location.replace("index.php");</script>';
                        }else{
                            echo '<script>alert("acesso negado!")</script>';
                        }                
                    }
                ?>   
            </div>    
        </div>
    </div>

<div id="particles-js"></div>
	

<!-- Scripts - Sempre ao fim do body-->	
<script type="text/javascript" src="js/jquery.js"></script>
<script text="text/javascript" src="js/bootstrap.js"></script>
<script text="text/javascript" src="js/lib/particles.js"></script>
<script text="text/javascript" src="js/app.js"></script>
<script text="text/javascript" src="js/lib/stats.js"></script>	
</body>
</html>

