<?php require '_header.php'; ?>

<h1>Utilisateurs</h1>

<div class="mt-5">
  <ul>
    <?php
    foreach ($users as $user) {
      echo '<li><a class="link-dark link-opacity-50-hover" href="?page=user_profile&id=????">' . $user['username'] . '</a></li>';
    }
    ?>
  </ul>
</div>

<?php require '_footer.php'; ?>
