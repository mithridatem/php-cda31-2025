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
 * @return array tableau nettoyé
 */
function sanitize_array(array $data): array
{   
    //Boucle pour itérer sur le tableau $data
    foreach ($data as $key => $value) {
        //Test si la valeur est de type string
        if (gettype($value) == "string") {
            $data[$key] = sanitize($value);
        }
        //Test si $value est un tableau
        if (gettype($value) == "array") {
            //nettoyage du sous tableau
            foreach ($value as $cle => $contenu) {
               $data[$key][$cle] = sanitize($contenu);
            }
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
