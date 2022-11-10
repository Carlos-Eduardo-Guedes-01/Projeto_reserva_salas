<?php
require_once 'Crud.php';
class Professor extends Crud{
    protected $table='Professor';
    public $matricula;
    private $senha;
    private $nome;
    private $curso;
    private $telefone;
    public function getMatricula() {
        return $this->matricula;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setCurso($curso): void {
        $this->curso = $curso;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }
    public function inserir() {
    $conecta=new Conexao();
    $query="insert into $this->table(matricula,senha,nome,curso,telefone) values ($this->matricula,$this->senha,$this->nome,$this->curso,$this->telefone));";
    return $conecta->conectar(mysqli_query($conecta, $query));
    }
    public function update($id) {
    $conecta=new Conexao();
    $query="update $this->table set matricula=$this->matricula,senha=$this->senha,nome=$this->nome,curso=$this->curso,telefone=$this->telefone;";
    return $conecta->conectar(mysqli_query($conecta, $query));    
    }
}

