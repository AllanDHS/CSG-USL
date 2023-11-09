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
    private int $score_equipe1;
    private int $score_equipe2;

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
            $insertequipe = "INSERT INTO `battle` (`mat_id`, `equ_id`,`equ_id_equipes`,`score_equipe1`,`score_equipe2`) VALUES (:mat_id, :equ_id, :equ_id_equipes, :score_equipe1, :score_equipe2)";

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
            $stmtequipe->bindValue(':score_equipe1', $inputs['score_equipe1'], PDO::PARAM_INT);
            $stmtequipe->bindValue(':score_equipe2', $inputs['score_equipe2'], PDO::PARAM_INT);
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

    public static function getAllBattles(): array
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
                `categories_equipes`';



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
     * modification d'un match
     * @param int $id identifiant du match à été modifié
     * @return bool Retourne true si le match a bien été modifié, sinon false
     */

    public static function updateMatch($inputs): bool
    {
        try {
            // Création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // Requête préparée pour modifier un match
            $modifymatch = "UPDATE `matchs` SET `mat_date` = :mat_date, `mat_place` = :mat_place, `com_id` = :com_id, `cat_id` = :cat_id WHERE `mat_id` = :mat_id";

            // Préparation de la requête
            $stmtmatch = $pdo->prepare($modifymatch);
            $stmtmatch->bindValue(':mat_date', $inputs['mat_date'], PDO::PARAM_STR);
            $stmtmatch->bindValue(':mat_place', $inputs['mat_place'], PDO::PARAM_STR);
            $stmtmatch->bindValue(':com_id', $inputs['com_id'], PDO::PARAM_INT);
            $stmtmatch->bindValue(':cat_id', $inputs['cat_id'], PDO::PARAM_INT);
            $stmtmatch->bindValue(':mat_id', $inputs['mat_id'], PDO::PARAM_INT); // Ajout du paramètre mat_id

            // Exécution de la requête préparée
            $stmtmatch->execute();

            // Requête pour mettre à jour les équipes dans la table `battle`
            $modifyEquipe = "UPDATE `battle` SET `equ_id` = :equ_id, `equ_id_equipes` = :equ_id_equipes, `score_equipe1`= :score_equipe1, `score_equipe2`= :score_equipe2 WHERE `mat_id` = :mat_id";

            // Préparation de la requête
            $stmtequipe = $pdo->prepare($modifyEquipe);
            $stmtequipe->bindValue(':equ_id', $inputs['equ_id'], PDO::PARAM_INT);
            $stmtequipe->bindValue(':equ_id_equipes', $inputs['equ_id_equipes'], PDO::PARAM_INT);
            $stmtequipe->bindValue(':mat_id', $inputs['mat_id'], PDO::PARAM_INT); // Ajout du paramètre mat_id
            $stmtequipe->bindValue(':score_equipe1', $inputs['score_equipe1'], PDO::PARAM_INT);
            $stmtequipe->bindValue(':score_equipe2', $inputs['score_equipe2'], PDO::PARAM_INT);

            // Exécution de la requête préparée
            $stmtequipe->execute();

            // Retourne true si le match a bien été modifié
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }


    /**
     * Récupération des informations d'un battle grace a son id
     * @param int $id identifiant du battle
     * @return array tableau contenant les informations du battle
     */
    public static function getBattleById(int $id): array
    {
        try {
            // Création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // Requête préparée pour récupérer les informations d'un match
            $sql = "SELECT * FROM `battle` NATURAL JOIN `matchs` NATURAL JOIN `competitions` NATURAL JOIN `categories_equipes` WHERE `bat_id` = :bat_id";

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association des valeurs aux paramètres de la requête préparée
            $stmt->bindValue(':bat_id', $id, PDO::PARAM_INT);

            // Exécution de la requête préparée
            $stmt->execute();

            // Retourne un tableau contenant les informations du match
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }












    /**
     * Suppression d'un match
     * @param int $id identifiant du match à supprimer
     * @return bool Retourne true si le match a bien été supprimé, sinon false
     */
    public static function deleteBattle(int $id): bool
    {

        try {
            // Création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // Requête préparée pour supprimer un match
            $sql = "DELETE FROM `battle` WHERE `bat_id` = :bat_id";

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association des valeurs aux paramètres de la requête préparée
            $stmt->bindValue(':bat_id', $id, PDO::PARAM_INT);

            // Exécution de la requête préparée
            $stmt->execute();

            // Retourne true si le match a bien été supprimé
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }


    public static function deleteMatchs(int $id): bool
    {

        try {
            // Création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // Requête préparée pour supprimer un match
            $sql = "DELETE FROM `matchs` WHERE `mat_id` = :mat_id";

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association des valeurs aux paramètres de la requête préparée
            $stmt->bindValue(':mat_id', $id, PDO::PARAM_INT);

            // Exécution de la requête préparée
            $stmt->execute();

            // Retourne true si le match a bien été supprimé
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
}
