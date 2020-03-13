<?php
    session_start();
    require_once 'class/Cliente.php';
    require_once 'class/Mensagem.php';
    require_once 'class/Upload.php';
    require_once 'class/Arquivo.php';
    require_once 'class/Funcoes.php';
    require_once 'class/Marcador.php';
    @$_SESSION['logado'];
    
    if(!@$_SESSION['logado']){
        if($_SERVER['PHP_SELF'] != '/bl_admin/login.php'){
            echo '<script>location.replace("login.php");</script>';
        }
    }
    
    if(@$_SESSION['logado']){
        if($_SERVER['PHP_SELF'] == '/bl_admin/login.php'){
            unset($_SESSION['contaLogada']);
            session_destroy();
        }
    }
?>













