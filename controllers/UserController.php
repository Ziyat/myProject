<?php

class UserController extends AdminBase
{
    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        $userId = $_SESSION['user'];
        $user = User::getUserById($userId);
        $lang = $_SESSION['lang'];
        $users = User::getUserOrderDescAdmin($page);
        $total = User::getTotalNews();
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/admin/user/index.php');
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $userId = $_SESSION['user'];
        $user = User::getUserById($userId);
        $userEdit = User::getUserById($id);
       
        $lang = $_SESSION['lang'];
        
        $name = $userEdit['name'];
        $login = $userEdit['login'];
        $password = '';
        $rePassword = '';
        $result = false;
        $errors = false;
        if (isset($_POST['submit'])) {
            
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $rePassword = $_POST['repassword'];
            $role = $_POST['role'];
            
            
            
           
            if (!User::checkName($name)) {
                $errors[] = ERROR_NAME;
                                
            }

            if (!User::checkPassword($password)) {
                $errors[] = ERROR_PASSWORD;
                
            }
            
            if ($password != $rePassword) {
                $errors[] = ERROR_REPASSWORD;
            }
            
            if ($errors == false) {
                $result = User::updateUser($id, $name, $login, $password, $role);
            }


        }

        require_once(ROOT . '/views/admin/user/update.php');

        return true;
    }
    public function actionRegister()
    {
        self::checkAdmin();
        $userId = $_SESSION['user'];
        $user = User::getUserById($userId);
       
        $lang = $_SESSION['lang'];
        
        $name = '';
        $login = '';
        $password = '';
        $rePassword = '';
        $result = false;
        $errors = false;
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $rePassword = $_POST['repassword'];
            $role = $_POST['role'];
            
            
            
            if (!User::checkLoginExists($login)) {
                $errors[] = ERROR_LOGIN;
                
            }
            if (!User::checkName($name)) {
                $errors[] = ERROR_NAME;
                                
            }

            if (!User::checkPassword($password)) {
                $errors[] = ERROR_PASSWORD;
                
            }
            
            if ($password != $rePassword) {
                $errors[] = ERROR_REPASSWORD;
            }
            
            if ($errors == false) {
                $result = User::register($name, $login, $password, $role);
            }


        }

        require_once(ROOT . '/views/admin/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        
        $lang = $_SESSION['lang'];
        $login = '';
        $password = '';
        
        if (isset($_POST['submit']) && $_SESSION['captcha_keystring'] == $_POST['captcha']) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $password = User::hashPassword($password);
            $errors = false;
              
            // Валидация полей
            if (!User::checkLogin($login)) {
                $errors[] = ERROR_EMAIL;
            }            
            if (!User::checkPassword($password)) {
                $errors[] = ERROR_PASSWORD;
            }
            
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($login, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = ERROR_USER_DATA;
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /". $_SESSION['lang'] ."/admin"); 
            }

        }

        require_once(ROOT . '/views/admin/user/login.php');

        return true;
    }
    
    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /". $_SESSION['lang']);
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        $userId = $_SESSION['user'];
        $user = User::getUserById($userId);
        $lang = $_SESSION['lang'];
        $userDel = User::getUserById($id);

        if(isset($_POST['submit']))
        {
            User::deleteUser($id);
            header("Location: /$lang/admin/user");
        }
        require_once(ROOT . '/views/admin/user/delete.php');
        return true;
    }
    
}
