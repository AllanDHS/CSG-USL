<?php

class Categories
{


    // Nus allons créer les propriétés de l'objet en fonction des champs de la table categories_equipes
    private $cat_id;
    private $cat_name;

    /**
     * Récupération de toutes les categories
     * @return array tableau contenant tous les types
     */
    public static function getAllCategories(): array
    {
        try{
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `categories_equipes`';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }


}