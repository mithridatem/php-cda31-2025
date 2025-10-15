<?php

/**
 * Méthode qui va nettoyer une chaine de caractère
 * @param string $value chaine à nettoyer
 * @return string chaine nettoyée
 */
function sanitize(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
}

/**
 * Méthode pour sanitize les colonnes d'un tableau
 * @param array $data Tableau 
 */
function sanitize_array(array $data): array
{
    foreach ($data as $key => $value) {
        //Test si la valeur est de type string
        if (gettype($value) == "string") {
            $data[$key] = sanitize($value);
        }
    }
    return $data;
}
/**
 * Méthode qui retourne l'extension d'un fichier
 * @param string $file nom du fichier
 * @return string extension du fichier
 */
function getFileExtension($file)
{
    return substr(strrchr($file, '.'), 1);
}
