<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Utilisateurs</title>
</head>
<body>
<h1>Utilisateurs</h1>

<ul>
  <?php
  foreach ($users as $user) {
    echo '<li>' . $user['username'] . '</li>';
  }
  ?>
</ul>

<div>
  <ul>
    <li><a href="?page=home">Accueil</a></li>
    <li><a href="?page=contact">Contact</a></li>
  </ul>
</div>
</body>
</html>
