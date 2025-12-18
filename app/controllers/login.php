<?php

require __DIR__ . '/../service/user_manager.php';



// Si on un formulaire a été transmis,
if (!empty($_POST)) {

    // On récupère les infos du formulaire
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    // On cherche l’utilisateur associé au "username" reçu dans le formulaire
    $user = userFindByUsername($data['username']);

    // Si l’utilisateur n’existe pas,
    if ($user === null) {
        $error = 'Identifiant ou mot de passe incorrect';
    } else {

        // Si le mot de passe de l’utilisateur n’est pas correct,
        $error = 'Identifiant ou mot de passe incorrect';

        // Sinon, si le formulaire est bien rempli,
        // On authentifie l’utilisateur en le stockant en session.

        dump($user);
    }

// Vérifier si le mot de passe est correct

}
require TEMPLATE_PATH . '/login.php';
