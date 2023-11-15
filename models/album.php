<?php

class Album
{

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


    /**
     * récupération de tous les albums
     * @return array
     */

    public static function getAllAlbums(): array
    {
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `album`';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $alb = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $alb;
    }


    /**
     * récupération d'un album
     * @param int $alb_id
     * @return array
     */

    public static function getAlbumName(int $alb_id): string
    {
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `album` WHERE `alb_id` = :alb_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':alb_id', $alb_id, PDO::PARAM_INT);
        $stmt->execute();
        $alb = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $alb['alb_name'];
        
    }

    /**
     * Suppresion d'un album
     * @param int $alb_id
     * @return bool
     */

    public static function deleteAlbum(int $alb_id): string{
        $pdo = Database::createInstancePDO();
        $sql = 'DELETE FROM `album` WHERE `alb_id` = :alb_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':alb_id', $alb_id, PDO::PARAM_INT);
        $stmt->execute();
        $alb = $stmt->fetch(PDO::FETCH_ASSOC);
        return $alb;
    }

    /**
     * affichage des albums avec les photos par rappport à l'id de l'album
     * @param int $alb_id
     * @return array
     */
    
    public static function getAlbumPhotos(int $alb_id): array
    {
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `album` NATURAL JOIN `photos` WHERE `alb_id` = :alb_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':alb_id', $alb_id, PDO::PARAM_INT);
        $stmt->execute();
        $alb = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $alb;
    }
}
