<?php
class Upload {
    private $arquivo;
    private $pasta;

    function __construct($arquivo,$pasta){
        $this->arquivo = $arquivo;
        $this->pasta   = $pasta;
    }
		
    private function getExtensao(){
        //retorna a extensao da imagem
        $ext = explode('.', $this->arquivo['name']);
        return $extensao = strtolower(end($ext));
    }
    public function salvar(){									
        $extensao = $this->getExtensao();
        $novo_nome = time() . '.' . $extensao;
        $destino = $this->pasta . $novo_nome;
        if (!move_uploaded_file($this->arquivo['tmp_name'], $destino)){            
            return FALSE;                    
        }
        return $destino;				
    }
}
