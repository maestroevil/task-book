<?php
// Класс "Autorization" отвечает за авторизацию администратора.
class Autorization {
    protected $login ;
    protected $password;
    

    //Сохраняет в обьекте пароль и логин
    public function setUser($login,$password){
        $this->setLogin($login);
        $this->setPassword($password);
    }
    //Проверяет на наличие данного пользователя и регистрирует это в сессиии.
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
    //Задает логин
    public function setLogin($login){
        $this->login = $login;
    }
    //Задает пароль
    public function setPassword($password){
        $this->password = $password;
    }

}