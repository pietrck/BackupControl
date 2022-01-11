<?php

namespace App\Model;
use \App\Model\DbConfig;

/**
 * 
 */
class DB extends DbConfig
{
    private $conn;

    private function open()
    {
        $this->conn = new \PDO("mysql:dbname=".$this->dbname.";host=".$this->host, $this->user, $this->password);
    }

    public function login($user, $pass)
    {
        $this->open();
        $query = $this->conn->prepare("select password from users where user = :user;");
        $query->bindParam("user",$user);
        $query->execute();

        $result = $query->fetchall(\PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $row) {
                if (password_verify($pass, $row['password'])) {
                    return true;
                }

                return false;
            }
        }

        return false;
    }

    public function insertUser($params = [])
    {
        $this->open();
        $query = $this->conn->prepare("insert into `users` (`user`, `password`, created_date) values (:user, :password, CURRENT_TIMESTAMP);");
        $password = password_hash($params['password'], PASSWORD_DEFAULT);

        $query->bindParam(":user", $params['user']);
        $query->bindParam(":password", $password);

        if ($query->execute()) {
            return true;         
        }

        return false;
    }
}
