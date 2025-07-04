<?php

$title = "Page d'accueil !";
ob_start();

if (isset($success_message) && $success_message !== null) {
    echo $success_message;
}

if(isset($error_message) && $error_message !== null) {
    echo $error_message;
}

if(!empty($users)) :
foreach($users as $user) :

?>

<div class="user">
    <h2><?= $user->getPseudo() ?></h2>
    <p>Email: <?=$user->getEmail() ?> </p>
    <p><a href="user/<?=$user->getId() ?>">Voir le user</a></p>
    <p><a href="user/delete/<?=$user->getId() ?>">Supprimer le user</a></p>
</div>

<?php
endforeach;
else :
    ?>
    <?php
    endif;
$content = ob_get_contents();
ob_end_clean();
require './view/page/base-html.php';

?>