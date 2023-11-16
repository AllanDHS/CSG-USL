<?php

class Form
{
    /**
     * Permet de sécuriser les données en appliquant les fonctions trim, stripslashes et htmlspecialchars
     * @param string Données à sécuriser et à rendre safe
     * @return string Donnée safe
     */
    public static function safeData($value): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
    public static function formatDateUsToFr($dateUS): string
    {
        return implode('/', array_reverse(explode('-', $dateUS)));
    }

    public static function HeureFormat($heure): string
    {
        return substr($heure, 0, 5);
    }


    /**
     * Permet de supprimer un fichier
     */

    public static function deleteFile($directory, $name): void
    {
        $file = $directory . $name;
        if (file_exists($file)) {
            unlink($file);
        }
    }

    /**
     * Permet de Supprimer l'ablum de la bdd ainsi que le dossier et les photos
     * @param string $directory
     * @return void
     */
    public static function deleteDirectory($directory): void
    {
        function rmdir_recursive($dir)
        {
            foreach (scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                else unlink("$dir/$file");
            }
            rmdir($dir);
        }

        // Emplacement de l'appel de la fonction (ligne 48 par exemple)
        rmdir_recursive($directory);
    }

    // Utilisation de la fonction


}
