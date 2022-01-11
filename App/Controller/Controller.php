<?php

namespace App\Controller;
use \App\Model\DB;
use \App\View\View;

/**
 * 
 */
class Controller extends DB
{
    public function loginMethod($post){
        $db = new DB();
        $result = $db->login($post['user'], $post['pass']);

        if (!$result) {
            return "Usuario ou senha incorreta";
        }

        $_SESSION['logged'] = true;
        header("Location: ");
    }

    public function logout(){
        session_unset();
        header("Location: ");
    }

    public function registerUser($post){
        $db = new DB();
        $db->insertUser($post);

        return true;
    }
}
