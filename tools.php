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
 * Méthode qui retourne l'extension d'un fichier
 * @param string $file nom du fichier
 * @return string extension du fichier
 */
function getFileExtension($file)
{
    return substr(strrchr($file, '.'), 1);
}