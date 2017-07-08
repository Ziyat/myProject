<?php

class CabinetController
{

    public function actionIndex()
    {
        $lang = $_SESSION['lang'];
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
                
        require_once(ROOT . '/views/content/cabinet/index.php');

        return true;
    }  
    
    public function actionEdit()
    {
        $lang = $_SESSION['lang'];
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $address = User::getUserAddressById($userId);
        $name = $user['name'];
        $phone = $user['phone'];
        $password = $user['password'];                
        $result = false;     

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $address['street'] = $_POST['street'];
            $address['building'] = $_POST['building'];
            $address['appt'] = $_POST['appt'];
            $address['entrance'] = $_POST['entrance'];
            $address['intercom'] = $_POST['intercom'];
            $address['people'] = $_POST['people'];
            $address['landmark'] = $_POST['landmark'];
            $errors = false;
            
            if (!User::checkName($name)) {
                $errors[] = ERROR_NAME;
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = ERROR_PASSWORD;
            }
            
            if ($errors == false) {
                $result = User::edit($userId, $name, $phone, $password, $address);
            }

        }

        require_once(ROOT . '/views/content/cabinet/edit.php');

        return true;
    }

}