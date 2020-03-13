<?php
require_once 'Conexao.php';
class Cliente {
    private $email;
    private $nome;
    
    public function getEmail() {
        return $this->email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function cadastrar() {
        $comandoSql = "CALL cliente_cadastrar('$this->email', '$this->nome');";
        return Conexao::Inserir($comandoSql);
    }
    public function cosultarTodos() {
        $comandoSql = "CALL cliente_cosultarTodos();";
        return Conexao::Consultar($comandoSql);
    }
    public function excluir() {
        $comandoSql = "CALL cliente_excluir('$this->email');";
        return Conexao::Deletar($comandoSql);    
    }
    public function consultarPorEmail() {
        $comandoSql = "CALL cliente_consultarPorEmail('$this->email')";        
        $result = Conexao::Consultar($comandoSql);
        if($result){
            $result = $result[0];
            $this->nome = $result['nome'];
            return TRUE;
        }
        return FALSE;
    }
}
