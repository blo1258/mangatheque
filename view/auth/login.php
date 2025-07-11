<?php
$title = "Login";
ob_start();
?>
   <div class="login-container">
    <h2>Login</h2>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="/mangatheque/login" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>
    <p style="margin-top: 20px;"><a href="/mangatheque/register">Pas encore de compte ? S'inscrire ici</a></p>
</div>

<?php
$content = ob_get_clean();

require __DIR__ . '/../base-html.php';
        
    

