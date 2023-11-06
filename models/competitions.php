<?php 

class Competitions{
    
        // Nus allons créer les propriétés de l'objet en fonction des champs de la table competitions
        private $com_id;
        private $com_name;
    
        /**
        * Récupération de toutes les competitions
        * @return array tableau contenant tous les types
        */
        public static function getAllCompetitions(): array
        {
            try{
                $pdo = Database::createInstancePDO();
                $sql = 'SELECT * FROM `competitions`';
                $stmt = $pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
}