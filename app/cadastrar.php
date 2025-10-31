<?php
    require_once __DIR__ . 'conexao.php';

Class Usuario {

    private $conexao;

    private $id;

    private $login;

    private $email;

    private $re;

    private $senha;

    private $admin;

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

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getAdmin() {
        return $this->admin;
    }
    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarUsuario(){

        $this->senha = hash('sha512', $this->senha);
        $consulta = $this->conexao->prepare("INSERT INTO usuarios(login, email, re, senha, setor, VALUES(?,?)");      
        $consulta->execute([$this->login, $this->email, $this->re , $this->senha, $this->setor]);
    }

    public function mostrarUsuario(){
        $consulta = $this->conexao->prepare("SELECT id_usuario, email, admin FROM usuario");      
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario(){
        $consulta = $this->conexao->prepare("SELECT id_usuario, email, admin FROM usuario WHERE id_usuario = ?");      
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

    public function buscarPorEmail($email): PDOStatement  {
        $consulta = $this->conexao->prepare("SELECT id_usuario, senha, admin FROM usuarios WHERE email = ?");
        $consulta->execute([$email]);
        return $consulta;
    }

    public function buscarPorSetor($setor): PDOStatement  {
        $consulta = $this->conexao->prepare("SELECT id_usuario, login, admin FROM usuarios WHERE setor = ?");
        $consulta->execute([$setor]);
        return $consulta;
    }




















}