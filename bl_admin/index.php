<!DOCTYPE html>
<?php
    require_once 'config.php';
    if(isset($_POST['btnAddMarcados'])){
        $marc = new Marcador();
        $marc->setNome($_POST['txtDescricao']);
        if(!$marc->cadastrar()){
            echo '<script>alert("Marcador não pode ser adicionado\nJá existe");</script>';
        }
    }
    if(isset($_POST['btnExcluirMarcados'])){
        $msg = new Mensagem();
        $msg->setMarcador($_POST['selectMarcador']);
        $msg->alterarMarcadorExcuido();
        $marc = new Marcador();
        $marc->setId($_POST['selectMarcador']);
        $marc->excluir();        
    }
?>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Area de administração BuildLab</title>

        <!-- favicon icons -->
        <link rel="shortcut icon" href="favicon.ico" >
        <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/icons/favicon-16x16.png">
        <link rel="manifest" href="img/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="img/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/meu_estilo.css">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'#textarea' });</script>
    </head>
    <body>        
    <div class="modal fade" id="myModalAdd" role="dialog">    
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">                
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post">                                               
                        <h4>Descrição do marcador</h4>
                        <div style="margin-bottom: 25px" class="input-group">         
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                            <input type="text" class="form-control" name="txtDescricao">                                        
                        </div>     
                        <div style="margin-bottom: 25px" class="input-group"> 
                            <button type="submit" name="btnAddMarcados" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-saved"></span> Criar
                            </button>
                        </div>        
                    </form> 
                </div>                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="myModalExcluir" role="dialog">    
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">                
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post">                                               
                        <h4>Excluir do marcador</h4>
                        <div style="margin-bottom: 25px" class="input-group">         
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>                                                           
                                <select class="form-control" name="selectMarcador">
                                    <?php
                                        $marcador = new Marcador();
                                        $resultado = $marcador->consultarTodos0();
                                        if($resultado){
                                            foreach ($resultado as $value) {                                               
                                                echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                                            }
                                        }
                                    ?> 
                                </select>                                                                 
                        </div>     
                        <div style="margin-bottom: 25px" class="input-group"> 
                            <button type="submit" name="btnExcluirMarcados" class="btn btn-primary">
                                <span class="glyphicon glyphicon-trash"></span> Excluir
                            </button>
                        </div>        
                    </form> 
                </div>                
            </div>
        </div>
    </div>
        
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">                
                <div class="sidebar-header">                    
                    <img src="img/logo.png" class="img-logo" alt="">
                    <strong>BL</strong>               
                </div>
                
                <ul class="list-unstyled components">                    
                    <li class="">                        
                        <a href="#">
                            <i class="glyphicon glyphicon-envelope"></i>Mensagens                            
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="?escrever"><i class="glyphicon glyphicon-pencil"></i>Escrever</a></li>
                            <?php
                                $marcador = new Marcador();
                                $resultado = $marcador->consultarTodos();
                                if($resultado){
                                    foreach ($resultado as $value) {
                                        echo '<li><a href="?mensagens='.$value['nome'].'"><i class="glyphicon glyphicon-flash"></i>'.$value['nome'].'</a></li>';
                                    }
                                }
                            ?>                            
                            <li class="">
                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i>Configurar</a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    <li style="margin-left: 20px;"><a href="#" data-toggle="modal" data-target="#myModalAdd"><i class="glyphicon glyphicon-pushpin"></i>Add Marcador</a></li>
                                    <li style="margin-left: 20px;"><a href="#" data-toggle="modal" data-target="#myModalExcluir"><i class="glyphicon glyphicon-trash"></i>Excluir Marcador</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </li>
                    <li class="">                        
                        <a href="#">
                            <i class="glyphicon glyphicon-book"></i>E-book                            
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="?upload">Upload</a></li>
                            <li><a href="?enviar_pdf">Enviar</a></li>
                        </ul>
                    </li>
                    <li class="">                        
                        <a href="#">
                            <i class="glyphicon glyphicon-thumbs-up"></i>Mídias sociais                           
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="?midias_social">Gerenciar</a></li>
                        </ul>
                    </li>
                    <li class="">                        
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>Lista de clientes                           
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="?consultar_clientes">Consultar</a></li>
                        </ul>
                    </li>
                </ul>               
            </nav>

            <!-- Page Content Holder -->
            
            <div id="content" style="width: 100%;">
                <div class="container-fluid">
                    <?php
                         if(isset($_GET['midias_social']))
                             require_once 'forms/midias_social.php';                  
                         elseif (isset($_GET['mensagens']))
                             require_once 'forms/mensagens.php';
                         elseif (isset($_GET['visualizar_msg']))
                             require_once 'forms/visualizar_msg.php';
                         elseif(isset($_GET['upload']))
                             require_once 'forms/cadastrar_arquivo.php';                    
                         elseif(isset($_GET['enviar_pdf']))
                             require_once 'forms/enviar_pdf.php';
                         elseif(isset ($_GET['escrever']))
                             require_once 'forms/escrever_email.php';
                         elseif(isset ($_GET['consultar_clientes']))
                             require_once 'forms/consultar_clientes.php';
                         else
                             require_once 'forms/mensagens.php';
                     ?>
                 </div>
             </div>
            </div>
            





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
