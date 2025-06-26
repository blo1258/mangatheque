<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mangateque</title>
</head>
<body>
    <?php
    session_start();
    if ( !empty($_POST['pseudo']) && !empty($_POST['pwd']) ) {
        $pseudo = $_POST['pseudo'];
        $pwd = $_POST['pwd'];

        $bdd = new PDO('mysql:host=localhost;dbname=mangatheque', 'root', 'root');

        $req = $bdd->prepare("SELECT id, pseudo, password FROM user WHERE pseudo = :pseudo");
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        if ($req->rowCount() == 1) {
            $user = $req->fetch(PDO::FETCH_ASSOC);
            echo '<h3 style= "color:blue";> Bienvenue ' . $user ['pseudo']. ' !</h3>';
            
        } else {
            $error = '<p style= "color:red";>Pseudo ou mot de passe incorrect</p>';
        }


        
    } else {
        $error = '<p style= "color:red";>Veuillez remplir tous les champs</p>';
    }

    ?>

    
    <form action="#" method="POST">
        <?php 
        if (isset($error)) {
            echo $error;
        }
        ?>
        <div><label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" >
    </div>
    <div>
        <label for="pwd">Password</label><br>
            <input type="password" id="pwd" name="pwd">
    </div>
    <div>
        <input type="submit" value="Connexion" id ="submit" name="submit">
    </div>
    </form>
</body>
</html>