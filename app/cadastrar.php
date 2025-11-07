<?php

    require_once __DIR__ . '/conexao.php';

Class Usuario {

    private $conexao;

    private $id;

    private $login_usuario;

    private $email;

    private $re;

    private $senha;

    private $eh_admin;

    private $setor;


    public function getId_Usuario(){

        return $this->id;
    }

    public function setId_Usuario($id){

        $this->id = $id;
    }

    public function getConexao() {
        return $this->conexao;
    }
    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function getLogin_usuario() {
        return $this->login_usuario;
    }
    public function setLogin_usuario($login_usuario) {
        $this->login_usuario = $login_usuario;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRe() {
        return $this->re;
    }
    public function setRe($re) {
        $this->re = $re;
    }
    public function getSetor() {
        return $this->setor;
    }
    public function setSetor($setor) {
        $this->re = $setor;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getEh_Admin() {
        return $this->eh_admin;
    }
    public function setEh_Admin($eh_admin) {
        $this->eh_admin = $eh_admin;
    }

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarUsuario(){

        $this->senha = hash('sha512', $this->senha);
        $consulta = $this->conexao->prepare("INSERT INTO usuarios(login_usuario, email, re, setor, senha, VALUES(?,?,?,?,?)");      
        $consulta->execute([$this->login_usuario, $this->email, $this->re , $this->senha, $this->setor]);
    }

    public function mostrarUsuario(){
        $consulta = $this->conexao->prepare("SELECT id_usuario, email, eh_admin FROM usuario");      
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario(){
        $consulta = $this->conexao->prepare("SELECT id_usuario, email, eh_admin FROM usuario WHERE id_usuario = ?");      
        $consulta->execute([$this->id]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    
    public function atualizarUsuario(){
        $this->id = $_GET["id_usuario"];
        $consulta = $this->conexao->prepare("UPDATE SET email = ?, senha = ? FROM usuario WHERE id_usuario = ?");      
        $consulta->execute([$this->id]);
    }

    public function excluirUsuario(){
        try {
            $consulta = $this->conexao->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
            $consulta->execute([$this->id]);
        } catch (PDOException $e) {
            echo "Erro ao excluir usuário: " . $e->getMessage();
        }
    }

    public function buscarPorLogin_usuario($login_usuario): PDOStatement  {
        $consulta = $this->conexao->prepare("SELECT id_usuario, senha, eh_admin FROM usuarios WHERE login_usuario = ?");
        $consulta->execute([$login_usuario]);
        return $consulta;
    }

    public function buscarPorEmail($email): PDOStatement  {
        $consulta = $this->conexao->prepare("SELECT id_usuario, senha, eh_admin FROM usuarios WHERE email = ?");
        $consulta->execute([$email]);
        return $consulta;
    }

    public function buscarPorSetor($setor): PDOStatement  {
        $consulta = $this->conexao->prepare("SELECT id_usuario, login_usuario, eh_admin FROM usuarios WHERE setor = ?");
        $consulta->execute([$setor]);
        return $consulta;
    }




















}