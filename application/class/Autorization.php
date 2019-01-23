<?php
// Класс "Router" отвечает за формирование ссылки.


class Autorization {
    protected $login ;
    protected $password;
    

    public function __construct(){

    }
    public function setUser($login,$password){
        $this->setLogin($login);
        $this->setPassword($password);
    }

    public function checkUser(){
        $login = "admin";
        $password = "123";
        if($this->login== $login && $this->password == $password){
            $_SESSION['nameUser'] = "Администратор";
            $_SESSION['autorization'] = true;
        }
        else
            $_SESSION['autorization'] = false;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function setPassword($password){
        $this->password = $password;
    }

}