<?php


class Actu
{

    private $_actu_id;
    private $_actu_date;
    private $_actu_title;
    private $_actu_type;
    private $_actu_content;
    private $_actu_pictures;

    /**
     * @param array $inputs tableau contenant les données du formulaire
     */



    public static function addActu($actu_date, $actu_title, $actu_type, $actu_text, $actu_pictures)
    {
        $pdo = Database::createInstancePDO();
        $sql = 'INSERT INTO `actualites` (`actu_date`, `actu_title`, `actu_type`, `actu_text`, `actu_pictures`) VALUES (:actu_date, :actu_title, :actu_type, :actu_text, :actu_pictures)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':actu_date', $actu_date, PDO::PARAM_STR);
        $stmt->bindValue(':actu_title', $actu_title, PDO::PARAM_STR);
        $stmt->bindValue(':actu_type', $actu_type, PDO::PARAM_STR);
        $stmt->bindValue(':actu_text', $actu_text, PDO::PARAM_STR);
        $stmt->bindValue(':actu_pictures', $actu_pictures, PDO::PARAM_STR);
        $stmt->execute();
        $actu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $actu;
    }


    /**
     * Récupération de tous les event
     * @return array tableau contenant tous les event
     */

    public static function getAllActu()
    {
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `actualites` ORDER BY `actu_date` DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $actu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $actu;
    }







    /**
     * Récupération des infos de l'actu
     * @param int $id id de l'actu
     * @return array tableau contenant les infos de l'actu
     */

    public static function getActuById(int $id){
        $pdo = Database::createInstancePDO();
        $sql = 'SELECT * FROM `actualites` WHERE `actu_id` = :actu_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':actu_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $actu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $actu;
    }






    /**
     * suppresion d'un event
     * @param int $id id de l'event à supprimer
     * @return bool true si l'event a bien été supprimé, sinon false
     */
    public static function deleteActu(int $id): bool 
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'DELETE FROM `actualites` WHERE `actu_id` = :actu_id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':actu_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }
}
