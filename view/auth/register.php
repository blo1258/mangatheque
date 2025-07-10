<?php
$title = "Register";
ob_start();
?>
<form action="/mangatheque/register" method="post">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
       
        <input type="submit" name="submit" value="Register"> </input>
    </div>
</form>



<?php
$content = ob_get_contents();
ob_end_clean();

require __DIR__ . '/../base-html.php';