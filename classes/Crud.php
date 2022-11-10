<?php
require_once 'Conexao.php';
abstract class Crud extends Conexao{
    protected $table;
    abstract public function inserir();
    abstract public function update($id);
    public function pesquisaAll(){
        $conexao=new Conexao();
        $query="select * from $this->table;";
        $conexao->conectar(mysqli_query($conexao, $query));
        return $conexao;
    }
    public function pesquisa($id){
        $conexao=new Conexao();
        $query="select * from $this->table where id=$id;";
        $conexao->conectar(mysqli_query($conexao, $query));
        return $conexao;
    }
    public function delete($id){
        $conexao=new Conexao();
        $query="delete from $this->table where id=$id";
        $conexao->conectar(mysqli_query($conexao, $query));
        return $conexao;
    }
}