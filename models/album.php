<?php

class Album {

    private $_alb_id;
    private $_alb_name;



    /**
     * création de d'un album
     * @param string $alb_name
     * @return bool
     */
    public static function addAlbum(string $alb_name): bool 
    {
        $pdo = Database::createInstancePDO();
        $sql = 'INSERT INTO `album` (`alb_name`) VALUES (:alb_name)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':alb_name', $alb_name, PDO::PARAM_STR);
        $stmt->execute();
        $alb = $stmt->fetch(PDO::FETCH_ASSOC);
        return $alb;
    }


}