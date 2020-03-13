<?php
require_once 'Conexao.php';
class Mensagem {
    private $id;
    private $cliente;
    private $assunto;
    private $texto;
    private $marcador;
    private $data;
    
    public function getMarcador() {
        return $this->marcador;
    }

    public function setMarcador($marcador) {
        $this->marcador = $marcador;
    }

    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getTexto() {
        return $this->texto;
    }
    
    public function getData() {
        return $this->data;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }
    
    public function setData($data) {
        $this->data = $data;
    }

    public function cadastrar() {
        $comandoSql = "CALL mensagem_cadastrar('$this->cliente','$this->assunto', '$this->texto')";        
        return Conexao::Inserir($comandoSql);
    }
    
    public function cosultarNaoLidas() {
        $comandoSql = "CALL mensagem_cosultarNaoLidas();";
        return Conexao::Consultar($comandoSql);
    }
    public function cosultarLidas() {
        $comandoSql = "CALL mensagem_cosultarLidas();";
        return Conexao::Consultar($comandoSql);
    }
    public function cosultarPorData() {
        $comandoSql = "CALL mensagem_cosultarPorData('$this->data');";
        return Conexao::Consultar($comandoSql);
    }
    public function excluir() {
        $comandoSql = "CALL mensagem_excluir('$this->id')";
        return Conexao::Deletar($comandoSql);
    }
    public function cosultarPorId() {
        $comandoSql =  "CALL `mensagem_cosultarPorId`($this->id);";
        $result = Conexao::Consultar($comandoSql)[0];
        if($result){
            $this->cliente = $result['cliente'];
            $this->assunto = $result['assunto'];
            $this->texto = $result['texto'];
            $this->marcador = $result['marcador'];
            $this->data = $result['data'];
            return TRUE;
        }
        return FALSE;
    }
    
    public function alterarMarcadorExcuido() {
        $comandoSql = "CALL mensagem_alterarMarcadorExcuido($this->marcador);";
        return Conexao::Alerar($comandoSql);
    }
    
    public function alterarVisualizacaoMarcador() {
        $comandoSql = "CALL mensagem_alterarVisualizacaoMarcador('$this->id','$this->marcador');";
        return Conexao::Alerar($comandoSql);
    }
    public function cosultarPorMarcador() {
        $comandoSql = "CALL mensagem_cosultarPorMarcador('$this->marcador');";
        return Conexao::Consultar($comandoSql);
    }
    
}
