<?php
require '_header.php'; ?>

<h1>Profil utilisateur</h1>

<div class="mt-5">
    <ul>
        <li><?php echo $user['firstname']; ?></li>
        <li><?php echo $user['username']; ?></li>
    </ul>
</div>

<?php
require '_footer.php'; ?>
