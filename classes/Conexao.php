<?php
class Conexao {
    private $hostname='localhost';
    private $user='root';
    private $senha='123456';
    private $db='salas';
    public function conectar(){
        return $conexao=new mysqli($this->hostname, $this->user, $this->senha, $this->db);
    }
}
