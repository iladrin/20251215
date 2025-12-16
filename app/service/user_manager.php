<?php


function userFind(int $id): ?array
{
    $users = require DATA_PATH . '/users.php';

    foreach ($users as $user) {
        if ($user['id'] === $id) {
            return $user;
        }
    }

    return null;
}
