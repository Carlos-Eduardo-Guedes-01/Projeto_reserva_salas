<?php
require_once 'Crud.php';
class Sala extends Crud{
    protected $table='sala';
    private $nome;
    private $numero;
    private $turma;
    private $tipo;
    public function getNome() {
        return $this->nome;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setNumero($numero): void {
        $this->numero = $numero;
    }

    public function setTurma($turma): void {
        $this->turma = $turma;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function inserir() {
        $conecta=new Conexao();
        $query="insert into $this->table(nome,numero,turma,tipo) values ($this->nome,$this->numero,$this->turma,$this->tipo);";
        return $conecta->conectar(mysqli_query($conecta, $query));
    }
    public function update($id) {
        $conecta=new Conexao();
        $query="update $this->table set matricula=$this->matricula,senha=$this->senha,nome=$this->nome,curso=$this->curso,telefone=$this->telefone;";
        return $conecta->conectar(mysqli_query($conecta, $query));    
    }
}
