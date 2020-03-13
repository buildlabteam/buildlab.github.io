<?php

function limpar_aspas($texto) {
    return str_replace('"', '@1#$', str_replace("'", "@#$", $texto));    
}

function retornar_aspas($texto) {
    return str_replace("@#$", "'", str_replace('@1#$', '"', $texto));
}

function enviar_email($emailOrigem,$emailCliente,$assunto,$mensagem) { 
    $headers .= "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";    
    $headers .= "From: BuildLab <$emailOrigem>\n";
    $headers .= "Return-Path: $emailOrigem\n";
    $headers .= "Reply-To: $emailOrigem\n";
    $msg = '<html lang="pt-BR">
            <head>
                    <meta charset="UTF-8">
                    <title></title>
            </head>
            <body>
                <p>'.$mensagem.'</p>
            </body>
            </html>';    
    return mail($emailCliente, utf8_decode($assunto), $mensagem, $headers,"-r".$emailOrigem);
}
