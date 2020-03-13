<?php
require_once 'Conexao.php';
class Marcador {
    private $id;
    private $nome;
    private $fixo;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFixo() {
        return $this->fixo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFixo($fixo) {
        $this->fixo = $fixo;
    }

    public function consultarTodos(){
        $comandoSql = "CALL marcador_consultarTodos();";
        return Conexao::Consultar($comandoSql);
    }
    
    public function consultarTodos0(){
        $comandoSql = "CALL marcador_consultarTodos0();";
        return Conexao::Consultar($comandoSql);
    }    
    
    public function cadastrar(){
        $comandoSql = "CALL marcador_cadastrar('$this->nome');";
        return Conexao::Inserir($comandoSql);
    }
    
    public function excluir(){
        $comandoSql = "CALL marcador_excluirPorId($this->id);";
        return Conexao::Deletar($comandoSql);
    }
    
    public function consultarPorNome() {
        $comandoSql = "CALL marcador_consultarPorNome('$this->nome');";
        $result = Conexao::Consultar($comandoSql)[0];
        if($result){
            $this->id = $result['id'];
            $this->nome = $result['nome'];
            $this->fixo = $result['fixo'];
            return TRUE;
        }
        return FALSE;
    }
    
    public function consultarPorId() {
        $comandoSql = "CALL marcador_consultarPorId('$this->id');";
        $result = Conexao::Consultar($comandoSql)[0];
        if($result){
            $this->id = $result['id'];
            $this->nome = $result['nome'];
            $this->fixo = $result['fixo'];
            return TRUE;
        }
        return FALSE;
    }

}
