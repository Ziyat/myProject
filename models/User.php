<?php

class User
{
    const SHOW_BY_DEFAULT = 8;
    /**
     * Регистрация пользователя 
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    static public function hashPassword($password)
    {
        if(isset($password))
        {
            if(CRYPT_SHA256 == 1)
            {
                $password = crypt($password, '$5$$usesomesillystringforsalt$');
                return $password;
            }
            
        }
    }
    public static function register($name, $login, $password, $role)
    {
        $password = self::hashPassword($password);
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, login, password, role, themes) VALUES (:name, :login, :password, :role, "")';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        if($result->execute())
        {
            return true;
        }
        return false;
    }

    /**
     * Редактирование данных пользователя
     * @param string $name
     * @param string $password
     */
    public static function edit($id, $name, $phone, $password, $address)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE user 
            SET name = :name, phone = :phone, password = :password
            WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_INT);       
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);   
        $result->bindParam(':password', $password, PDO::PARAM_STR); 
        if ($result->execute())
        {
            $sql2 = "UPDATE user_address SET street = :street, building = :building, appt = :appt, entrance = :entrance, intercom = :intercom, people = :people, landmark = :landmark WHERE user_id = :id";
            $result2 = $db->prepare($sql2);                                  
            $result2->bindParam(':id', $id, PDO::PARAM_INT);       
            $result2->bindParam(':street', $address['street'], PDO::PARAM_STR);
            $result2->bindParam(':building', $address['building'], PDO::PARAM_STR);
            $result2->bindParam(':appt', $address['appt'], PDO::PARAM_STR);
            $result2->bindParam(':entrance', $address['entrance'], PDO::PARAM_STR);
            $result2->bindParam(':intercom', $address['intercom'], PDO::PARAM_STR);
            $result2->bindParam(':people', $address['people'], PDO::PARAM_STR);
            $result2->bindParam(':landmark', $address['landmark'], PDO::PARAM_STR);
            return $result2->execute();
        }
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $login
     * @param string $password
     * @return mixed : ingeger user id or false
     */
    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['user_id'];
        }

        return false;
    }

    /**
     * Запоминаем пользователя
     * @param string $email
     * @param string $password
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /".$_SESSION['lang']."/user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет login
     */
    public static function checkLogin($Login)
    {
        if (strlen($password) >= 4) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkLoginExists($login)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
        {
            return false;
        }
        return true;
    }

    /**
     * Returns user by id
     * @param integer $id
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE user_id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }
    public static function getUserName($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT name FROM user WHERE user_id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $userName = $result->fetch();
            $userName = $userName['name'];


            return $userName;
        }
    }

     public static function getUserAddressById($id)
     {
         if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user_address WHERE user_id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
     }

    static public function getUserOrderDescAdmin($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user ORDER BY user_id DESC LIMIT '. self::SHOW_BY_DEFAULT .' OFFSET '. $offset;
        $result = $db->prepare($sql);
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    static public function getTotalNews()
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(user_id) AS count FROM user';
        $result = $db->prepare($sql);
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    static public function updateUser($id, $name, $login, $password, $role)
    {
        $password = self::hashPassword($password);
        $db = Db::getConnection();
        $sql = "UPDATE user SET
        name = :name,
        login = :login,
        password = :password,
        role = :role
        WHERE user_id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    static public function deleteUser($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM user WHERE user_id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
