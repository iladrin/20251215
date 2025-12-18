<?php

require_once __DIR__ . '/../service/user_manager.php';
require_once __DIR__ . '/../service/security.php';

denyAccessUnlessHasRole('ROLE_ADMIN');

// Atelier de tri pour classer les utilisateurs par username
$users = getUsers();

uasort($users, function (array $user1, array $user2): int {
    return $user1['username'] <=> $user2['username'];
});

require TEMPLATE_PATH . '/users.php';
