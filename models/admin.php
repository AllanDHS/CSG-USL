<?php

class Admin {

        private $_adm_id;
        private $_adm_login;
    
        public static function getAdmin($login) {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `admin` WHERE `adm_login` = :adm_login';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':adm_login', $login, PDO::PARAM_STR);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            return $admin;
            
        }
    }