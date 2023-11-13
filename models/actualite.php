<?php


class Actu{

    private $_actu_id;
    private $_actu_date;
    private $_actu_title;
    private $_actu_type;
    private $_actu_content;
    private $_actu_pictures;
    
    public static function addActu($actu_date, $actu_title, $actu_type, $actu_text, $actu_pictures){
        $pdo = Database::createInstancePDO();
        $sql = 'INSERT INTO `actualites` (`actu_date`, `actu_title`, `actu_type`, `actu_text`, `actu_pictures`) VALUES (:actu_date, :actu_title, :actu_type, :actu_text, :actu_pictures)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':actu_date',$actu_date, PDO::PARAM_STR);
        $stmt->bindValue(':actu_title',$actu_title, PDO::PARAM_STR);
        $stmt->bindValue(':actu_type',$actu_type, PDO::PARAM_STR);
        $stmt->bindValue(':actu_text',$actu_text, PDO::PARAM_STR);
        $stmt->bindValue(':actu_pictures',$actu_pictures, PDO::PARAM_STR);
        $stmt->execute();
        $actu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $actu;

    }


    public static function getActu(){
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `actualites`';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $actu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $actu;
    }




}