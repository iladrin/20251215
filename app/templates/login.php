<?php require TEMPLATE_PATH . '/_header.php'; ?>

<div class="container w-50 m-auto bg-secondary p-5 rounded-3">
<form action="#" method="post" class="">
    <h1 class="h3 mb-3 fw-normal">Qui es-tu, étranger ?</h1>

    <?php if (isset($error)) { ?>
      <div class="alert">
        <?php echo $error; ?>
      </div>
    <?php } ?>

    <div class="form-floating mb-2">
        <input name="username" type="text" id="floatingUsername" class="form-control" required/>
        <label for="floatingUsername">Nom d’utilisateur</label>
    </div>
    <div class="form-floating mb-2">
        <input name="password" type="password" id="floatingPassword" class="form-control" required/>
        <label for="floatingPassword">Mot de passe</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
</form>
</div>

<?php require TEMPLATE_PATH . '/_footer.php'; ?>
