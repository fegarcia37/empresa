<?php

include './Generic.class.php';

class Empresa extends Generic {

    protected $nomeF;
    protected $razaoS;
    protected $cnpj;
    protected $foneEmpresa;
    protected $atividadePrincipal;
    protected $site;
    protected $nomeContato;
    protected $telefoneContato;

    function getNomeF() {
        return $this->nomeF;
    }

    function getRazaoS() {
        return $this->razaoS;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getFoneEmpresa() {
        return $this->foneEmpresa;
    }

    function getAtividadePrincipal() {
        return $this->atividadePrincipal;
    }

    function getSite() {
        return $this->site;
    }

    function getNomeContato() {
        return $this->nomeContato;
    }

    function getTelefoneContato() {
        return $this->telefoneContato;
    }

    function setNomeF($nomeF) {
        $this->nomeF = $nomeF;
    }

    function setRazaoS($razaoS) {
        $this->razaoS = $razaoS;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setFoneEmpresa($foneEmpresa) {
        $this->foneEmpresa = $foneEmpresa;
    }

    function setAtividadePrincipal($atividadePrincipal) {
        $this->atividadePrincipal = $atividadePrincipal;
    }

    function setSite($site) {
        $this->site = $site;
    }

    function setNomeContato($nomeContato) {
        $this->nomeContato = $nomeContato;
    }

    function setTelefoneContato($telefoneContato) {
        $this->telefoneContato = $telefoneContato;
    }

    function Cadastra() {
        $this->con = new Conexao();
        $this->con->Conecta();
        $sql = 'INSERT INTO empresa(nome_fant, razao_soc, cnpj, fone_empresa, ativ_principal, site, nome_contato, fone_contato) VALUES ("' . $this->nomeF . '","' . $this->razaoS . '","' . $this->cnpj . '","' . $this->foneEmpresa . '","' . $this->atividadePrincipal . '","' . $this->site . '","' . $this->nomeContato . '","' . $this->telefoneContato . '")';
        $this->con->Executa($sql);
        $this->con->Desconecta();
    }

    function Atualiza() {
        $this->con = new Conexao();
        $this->con->Conecta();
        $sql = 'UPDATE empresa SET nome_fant="' . $this->nomeF . '",razao_soc="' . $this->razaoS . '",cnpj="' . $this->cnpj . '",fone_empresa="' . $this->foneEmpresa . '",ativ_principal="' . $this->atividadePrincipal . '",site="' . $this->site . '",nome_contato="' . $this->nomeContato . '",fone_contato="' . $this->telefoneContato . '" WHERE id=' . $this->id . '';
        $this->con->Executa($sql);
        $this->con->Desconecta();
    }

    function Delete($id) {
        $this->con = new Conexao();
        $this->con->Conecta();
        $sql = 'DELETE FROM `empresa` WHERE id= ' . $id . '';
        $this->con->Executa($sql);
        $this->con->Desconecta();
    }

}
