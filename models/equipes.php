<?php

class Equipe
{

    // Nus allons créer les propriétés de l'objet en fonction des champs de la table equipes
    private $equ_id;
    private $equ_name;
    private $equ_logo;

    /**
     * Récupération de toutes les equipes
     * @return array tableau contenant tous les types
     */
    public static function getAllEquipes(): array
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `equipes`';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function getEquipesInfo(int $id): array
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `equipes` WHERE `equ_id` = ' . $id . '';
            $stmt = $pdo->query($sql);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
