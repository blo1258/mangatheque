<?php

$title = "Page d'accueil !";
ob_start();
foreach($users as $user) :

?>

<div class="user">
    <h2><?= $user->getPseudo() ?></h2>
    <p>Email: <?=$user->getEmail() ?> </p>
    <p><a href="">Voir le user</a></p>

</div>

<?php
endforeach;
$content = ob_get_contents();
ob_end_clean();
require './view/page/base-html.php';



?>