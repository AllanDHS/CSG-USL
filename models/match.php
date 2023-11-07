<?php

class Matchs
{


    // Nus allons créer les propriétés de l'objet en fonction des champs de la table matchs
    private int $mat_id;
    private string $mat_date;
    private string $mat_place;
    private int $com_id;
    private int $cat_id;

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
            $sql = "INSERT INTO `matchs` (`mat_date`, `mat_place`, `com_id`, `cat_id`) VALUES (:mat_date, :mat_place, :com_id, :cat_id)";

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association des valeurs aux paramètres de la requête préparée
            $stmt->bindValue(':mat_date', $inputs['date_match'], PDO::PARAM_STR);
            $stmt->bindValue(':mat_place', $inputs['lieu'], PDO::PARAM_STR);
            $stmt->bindValue(':com_id', $inputs['competitions'], PDO::PARAM_INT);
            $stmt->bindValue(':cat_id', $inputs['categories'], PDO::PARAM_INT);


            // Exécution de la requête préparée
            $stmt->execute();
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
                    `mat_place`,`com_name`,`cat_name`,`mat_date`,
                    GROUP_CONCAT(`equipes`.`equ_name`
                     SEPARATOR "-") AS `equipes` FROM `equipes_match`
                    NATURAL JOIN `matchs`
                    NATURAL JOIN `competitions`
                    NATURAL JOIN `equipes`
                    NATURAL JOIN `categories_equipes`
                    ORDER BY `mat_date` ASC';


            // Préparation de la requête
            $stmt = $pdo->query($sql);

            // Exécution de la requête
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retourne le tableau contenant tous les matchs
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
