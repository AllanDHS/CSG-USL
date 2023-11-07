<?php

class Matchs
{


    // Nus allons créer les propriétés de l'objet en fonction des champs de la table matchs
    private int $mat_id;
    private string $mat_date;
    private string $mat_place;
    private int $com_id;
    private int $cat_id;
    private int $equ_id;
    private int $equ_id_equipes;

    /**
     * Ajouter un match dans la base de données
     * @param array $inputs tableau contenant les données du formulaire
     * @return bool Retourne true si l'animal a bien été ajouté, sinon false
     */
    public function addMatch(array $inputs): bool
    {

        try {
            // Création d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();


            // Requête préparée pour insérer les données dans la table matchs
            $insertmatch = "INSERT INTO `matchs` (`mat_date`, `mat_place`, `com_id`, `cat_id`) VALUES (:mat_date, :mat_place, :com_id, :cat_id)";
            $idmatch = $pdo->lastInsertId();
            $insertequipe = "INSERT INTO `battle` (`mat_id`, `equ_id`,`equ_id_equipes`) VALUES (:mat_id, :equ_id, :equ_id_equipes)";
            
            // Préparation de la requête
            $stmtmatch = $pdo->prepare($insertmatch);
            $stmtmatch->bindValue(':mat_date', $inputs['mat_date'], PDO::PARAM_STR);
            $stmtmatch->bindValue(':mat_place', $inputs['mat_place'], PDO::PARAM_STR);
            $stmtmatch->bindValue(':com_id', $inputs['com_id'], PDO::PARAM_INT);
            $stmtmatch->bindValue(':cat_id', $inputs['cat_id'], PDO::PARAM_INT);
            $stmtmatch->execute();
            $idmatch = $pdo->lastInsertId();
            // Association des valeurs aux paramètres de la requête préparée
            $stmtequipe = $pdo->prepare($insertequipe);
            $stmtequipe->bindValue(':mat_id', $idmatch, PDO::PARAM_INT);
            $stmtequipe->bindValue(':equ_id', $inputs['equ_id'], PDO::PARAM_INT);
            $stmtequipe->bindValue(':equ_id_equipes', $inputs['equ_id_equipes'], PDO::PARAM_INT);
            // Exécution de la requête préparée
            $stmtequipe->execute();
            return true;
        } catch (PDOException $e) {
            // echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    /**
     * Récupération de tous les matchs
     * @return array tableau contenant tous les matchs
     */

    public static function getAllMatchs(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // Requête préparée pour récupérer tous les matchs
            $sql = 'SELECT 
                    *
                FROM
                `battle`
                 NATURAL JOIN
                `matchs`
                NATURAL JOIN
                `competitions`
                NATURAL JOIN
                `categories_equipes`
                WHERE
                `score_equipe1` IS NULL
                AND `score_equipe2` IS NULL';


            // Préparation de la requête
            $stmt = $pdo->query($sql);

            // Exécution de la requête
            $match = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retourne le tableau contenant tous les matchs
            return $match;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Suppression d'un match
     * @param int $id identifiant du match à supprimer
     * @return bool Retourne true si le match a bien été supprimé, sinon false
     */
    public static function deleteMatch(int $id): bool{
            
            try {
                // Création d'une instance PDO
                $pdo = Database::createInstancePDO();
    
                // Requête préparée pour supprimer un match
                $sql = "DELETE FROM `matchs` WHERE `mat_id` = :id";
    
                // Préparation de la requête
                $stmt = $pdo->prepare($sql);
    
                // Association des valeurs aux paramètres de la requête préparée
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
                // Exécution de la requête préparée
                $stmt->execute();
    
                // Retourne true si le match a bien été supprimé
                return true;
            } catch (PDOException $e) {
                // echo "Erreur : " . $e->getMessage();
                return false;
            }
    }

}
