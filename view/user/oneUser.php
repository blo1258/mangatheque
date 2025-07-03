<?php
$title = "Utilisateur: ".$user->getPseudo();
ob_start();


?>

<div class="user">
    <h2><?= $user->getPseudo() ?></h2>
    <p>Email: <?=$user->getEmail() ?> </p>
    <p>Créé le <?= $user->getCreated_at()->format('Y-m-d H:i:s') ?></p>

</div>

<?php

$content = ob_get_contents();
ob_end_clean();
require './view/page/base-html.php';