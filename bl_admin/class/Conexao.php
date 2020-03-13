<?php
class Conexao {
    private static $cx_host = "localhost"; 
    private static $cx_usuario = "build192";
    private static $cx_senha = "BuildLab@2017";
    private static $cx_dbnome = "build192_bl_admin";
    protected static $cx_dbconectado;   
   
    public static function Conectar() {
        Conexao::$cx_dbconectado = new PDO('mysql:host='.Conexao::$cx_host.';dbname='.Conexao::$cx_dbnome, Conexao::$cx_usuario, Conexao::$cx_senha);              
    }

    public static function Desconectar() {
        Conexao::$cx_dbconectado = NULL;
    }

    public static function Consultar($comandoSql) {
        Conexao::Conectar();           
        $result = Conexao::$cx_dbconectado->prepare($comandoSql);
        $result->execute();
        $countRows = $result->rowCount();            
        if ($countRows != 0) {
            Conexao::Desconectar();
            return $result->fetchAll();                
        }
        Conexao::Desconectar();
        return FALSE;          
    }
    public static function Deletar($comandoSql) {
        Conexao::Conectar();           
        $result = Conexao::$cx_dbconectado->exec($comandoSql);
        Conexao::Desconectar();
        return $result;
    }
    public static function Alerar($comandoSql) {
        Conexao::Conectar();          
        $result = Conexao::$cx_dbconectado->exec($comandoSql);
        Conexao::Desconectar();
        return $result;       
    }
    
    public static function Inserir($comandoSql) {
        Conexao::Conectar();           
        $result = Conexao::$cx_dbconectado->prepare($comandoSql)->execute();
        Conexao::Desconectar();
        return $result;
    }
    
}
