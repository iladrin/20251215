<?php

function getUsers(): array
{
    // Stockage des $users dans une mémoire "static", restaurée au prochain appel à cette fonction
    static $users = null;

    if ($users === null) {
        // L’appel ci-dessous ne sera exécuté qu’au premier appel à cette fonction (variable "static")
        $users = getUsersFromYaml();
    }

    return $users;
}

function getUsersFromPhp(): array
{
    return require DATA_PATH . '/users.php';
}

function getUsersFromCsv(): array
{
    $file = fopen(DATA_PATH . '/users.csv', 'r');

    $users = [];
    while (($data = fgetcsv(stream: $file, enclosure: '"', escape: '\\')) !== false) {
        $user = [
            'id' => (int) $data[0],
            'firstname' => $data[1],
            'username' => $data[2],
            'roles' => explode(',', $data[3]),
        ];

        $users[] = $user;
    }

    return $users;
}

function getUsersFromYaml(): array
{
    return \Symfony\Component\Yaml\Yaml::parseFile(DATA_PATH . '/users.yaml');
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

