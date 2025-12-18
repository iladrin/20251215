<?php

function denyAccessUnlessHasRole(string $role): void
{
    // Si l’utilisateur n’est même pas authentifié, ouste, page de connexion
    if (!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        die;
    }

    // Si l’utilisateur n’a pas le rôle demandé, ouste, page d’accueil
    if (!in_array($role, $_SESSION['user']['roles'])) {
        header('Location: ?page=home');
        die;
    }
}
