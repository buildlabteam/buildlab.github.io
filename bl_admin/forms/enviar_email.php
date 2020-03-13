<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome     = 'Eliton';
        $email    = 'camargoliveira@gmail.com';
        $mensagem = 'testes';
        $corpo  = "Nome: ".$nome."<BR>\n";
        $corpo .= "Email: ".$email."<BR>\n";
        $corpo .= "Mensagem: ".$mensagem."<BR>\n";
        if(mail("eliton.oliveira5@etec.sp.gov.br","Assunto",$corpo)){
          echo("email enviado com sucesso");
        } else {
          echo("Erro ao enviar e-mail");
        }
        ?>
    </body>
</html>
