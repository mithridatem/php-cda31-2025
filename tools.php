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
