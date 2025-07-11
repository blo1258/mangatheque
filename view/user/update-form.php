<?php
$title = "Editer utilisateur : {$user->getPseudo()}";
ob_start();
?>
<div class="user">
    <h1>Utilisateur <?= $user->getPseudo() ?></h1>
    <form action="/mangatheque/user/update/<?= $user->getId() ?>" method="POST">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" value="<?= $user->getPseudo() ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= $user->getEmail() ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe actuel</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe actuel si vous souhaitez le changer">
        </div>
        <div class="form-group">
            <label for="new_password">Nouveau mot de passe</label>
            <input type="password" id="new_password" name="new_password">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmer le nouveau mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        <div class="form-group">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';