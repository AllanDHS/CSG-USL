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
     * Permet de 
     */

     public static function deleteFile($directory, $name): void
     {
         $file = $directory . $name;
         if (file_exists($file)) {
             unlink($file);
         }
     }

}