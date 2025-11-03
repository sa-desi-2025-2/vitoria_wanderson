<?php

require_once __DIR__ . "/conexao.php";
require_once __DIR__ . "/cadastrar.php";
require_once __DIR__ . "/login.php";


class Gateway {


    public function run(){

        session_start();


        $acao = $_REQUEST['acao'] ?? '';

        switch($acao){

            case 'login':
                
        }
    }
}
