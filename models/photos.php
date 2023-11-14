<?php


class Photos{

    private $pho_id;
    private $pho_name;
    private $alb_id;


    /**
     * ajout des photos dans la base de données
     * @param string $photo_name
     * @param int $alb_id
     */

    public static function addPhoto(string $pho_name, int $alb_id){
        
        $pdo = Database::createInstancePDO();
        $sql = "INSERT INTO photos (pho_name, alb_id) VALUES (:pho_name, :alb_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':photo_name', $pho_name, PDO::PARAM_STR);
        $stmt->bindValue(':alb_id', $alb_id, PDO::PARAM_INT);
        $stmt->execute();


    }
}