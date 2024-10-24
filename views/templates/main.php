<?php 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./contenu/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <dev class="main-nav">
            <img src="contenu/img/logo.png" alt="logo" class="logo">
            <nav>
                <dev class="first-navbar">
                    <a href="index.php?action=home">Acceuil</a>
                    <a href="index.php?action=exchange">Nos livres à l'échange</a>
                </dev>
                <dev class="second-navbar">
                    <a href=""><img src="contenu/img/icon_message.png" alt="message icon" class="nav_icon">Messagerie</a>
                    <a href="index.php?action=dashboard"><img src="contenu/img/icon_user.jpg" alt="user icon" class="nav_icon">Mon compte</a>
                    <a href="index.php?action=connexion">Connexion</a>
                </dev>
            </nav>
        </dev>
    </header>

    <main> 
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <footer>
        <a href="#">Politique de confidentialité</a>
        <a href="#">Mention légales</a>
        <a href="#">Tom Troc©</a>
        <img src="contenu/img/footer_icon.png" alt="footer tomtroc logo">
    </footer>

</body>
</html>