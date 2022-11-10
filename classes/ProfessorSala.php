<?php
require_once 'Professor.php';
class ProfessorSala extends Professor{
    protected $table='professor_sala';
    public function inserir() {
        $conecta=new Conexao();
        $conecta->conectar(query("select id from $this->table where matricula=$this->matricula"));
        $query="insert into $this->table(Professor_idAluno,Sala_idSala,data_reserva,) values ($this->matricula,$this->senha,$this->nome,$this->curso,$this->telefone));";
        return $conecta->conectar(mysqli_query($conecta, $query));
    }
}
