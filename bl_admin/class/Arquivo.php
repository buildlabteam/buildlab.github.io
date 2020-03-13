<?php
require_once 'Conexao.php';;
class Arquivo {
    private $link;
    private $descricao;
    private $data_public;
    
    public function getLink() {
        return $this->link;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getData_public() {
        return $this->data_public;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setData_public($data_public) {
        $this->data_public = $data_public;
    }

    public function cadastrar() {
        $comandoSql = "CALL `arquivo_cadastrar`('$this->link', '$this->descricao');";
        return Conexao::Inserir($comandoSql);
    }
    
    public function cosultar() {
        $comandoSql = "CALL `arquivo_cosultarTodos`();";
        return Conexao::Consultar($comandoSql);
    }
}
