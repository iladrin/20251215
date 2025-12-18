<?php

require_once __DIR__ . '/database.php';

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
            'password' => $data[4]
        ];

        $users[] = $user;
    }

    return $users;
}

function getUsersFromYaml(): array
{
    return \Symfony\Component\Yaml\Yaml::parseFile(DATA_PATH . '/users.yaml');
}

function getUsersFromDatabase(): array
{
    $pdo = getDbConnection();

    $statement = $pdo->prepare('SELECT * FROM user');
    $statement->execute();

    $data = $statement->fetchAll();

    $users = [];
    foreach ($data as $row) {
        $user = [
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'username' => $row['username'],
            'roles' => explode(',', $row['roles']),
            'password' => $row['password']
        ];

        $users[] = $user;
    }

    return $users;
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

function userFindByUsername(string $username): ?array
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }

    return null;
}
