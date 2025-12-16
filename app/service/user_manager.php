<?php

function getUsers(): array
{
    // Stockage des $users dans une mémoire "static", restaurée au prochain appel à cette fonction
    static $users = null;

    if ($users === null) {
        // L’appel ci-dessous ne sera exécuté qu’au premier appel à cette fonction (variable "static")
        $users = getUsersFromPhp();
    }

    return $users;
}

function getUsersFromPhp(): array
{
    return require DATA_PATH . '/users.php';
}

function userFind(int $id): ?array
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['id'] === $id) {
            return $user;
        }
    }

    return null;
}

