<?php

namespace application\controller;
use application\model\Category;
use application\model\User as UserModel;

class User extends Controller
{


    public function login()
    {
        if (isset($_SESSION['login'])){
            $this->route('admin');
        }
        $category=new Category();
        $categories = $category->all();
        $this->view('app.login',compact('categories'));
        if ($_POST){
            $login = new UserModel();
            $res = $login->find($_POST['username']);
            if ($res){
                if ($res->password == $_POST["password"]){
                    $this->route("admin");
                    $_SESSION['login'] = $res->username;
                }else{
                    ?>
                        <script> document.getElementById('pass-error').style.display='block'; </script>
                    <?php
                }
            }else{
                ?>
                <script> document.getElementById('user-error').style.display='block'; </script>
                <?php
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->route('user/login');
    }
    public function register()
    {
        if (isset($_SESSION['login'])){
            $this->route('admin');
        }
        $category=new Category();
        $categories = $category->all();
        $this->view('app.register',compact('categories'));

        if (isset($_POST)){
            $register = new UserModel();
            $register->insert($_POST);
        }
    }
}