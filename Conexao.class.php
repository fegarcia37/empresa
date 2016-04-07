<?php

class Conexao {

    protected $mysqli;
    protected $servidor = '127.0.0.1';
    protected $usuario = 'root';
    protected $senha = '';
    protected $baseDeDado = 'empresa';
    public $total = 0;

    public function Conecta() {
        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->baseDeDado);

        if ($this->mysqli->errno) {
            echo $this->mysqli->connect_errno;
            exit();
        }
    }

    public function Consulta($sql) {
        try {
            if ($result = $this->mysqli->query($sql)) {
                $this->total = $result->num_rows;
                return $result;
            } else {
                $this->total = 0;
                return null;
            }
        } catch (Exception $exc) {
            $this->Desconecta();
        }
    }

    public function Executa($sql) {
        try {
            if ($result = $this->mysqli->query($sql)) {
                $ultimoId = $this->mysqli->insert_id;
                $this->mysqli->commit;
                $this->total = $this->mysqli->affected_rows;
                return $ultimoId;
            } else {
                $this->total = 0;
                throw new Exception('Erro');
                return 'Nenhum registro foi afetado';
            }
        } catch (Exception $ex) {
            $this->mysqli->rollback();
            $this->Desconecta();
        }
    }
    public function Desconecta(){
        $this->mysqli->close();
    }
    function __construct() {
        
    }

}
