<?php

// Déconnexion en supprimant l’utilisateur de la session
unset($_SESSION['user']);

// Redirection vers la page d’accueil
header('Location: ?page=home');
