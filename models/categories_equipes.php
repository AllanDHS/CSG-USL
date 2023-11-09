<?php

class Categories
{


    // Nous allons créer les propriétés de l'objet en fonction des champs de la table categories_equipes
    private $cat_id;
    private $cat_name;

    /**
     * Récupération de toutes les categories
     * @return array tableau contenant tous les types
     */
    public static function getAllCategories(): array
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `categories_equipes`';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }


    /**
     * Récupération d'une catégorie en fonction de son id
     * @param int $id
     * @return array tableau contenant toutes les infos de la catégorie
     */
    public static function getCategorieById(int $id): array
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `categories_equipes` WHERE `cat_id` = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
