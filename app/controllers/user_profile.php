<?php

require_once __DIR__ . '/../service/user_manager.php';

if (!isset($_GET['id'])) {
    echo 'Profil utilisateur introuvable';
    http_response_code(404);
    die;
}

$id = (int) $_GET['id'];

$user = userFind($id);

if ($user === null) {
    echo 'Profil utilisateur introuvable';
    http_response_code(404);
    die;
}

require TEMPLATE_PATH . '/user_profile.php';
