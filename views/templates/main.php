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
        <div class="main-nav">
            <img src="contenu/img/logo.png" alt="logo" class="logo">
            <nav>
                <div class="first-navbar">
                    <a href="index.php?action=home" class="<?= isset($_GET['action']) && $_GET['action'] === 'home' ? 'active' : '' ?>">Accueil</a>
                    <a href="index.php?action=exchange" class="first-navbar-a <?= isset($_GET['action']) && $_GET['action'] === 'exchange' ? 'active' : '' ?>">Nos livres à l'échange</a>
                </div>
                <div class="second-navbar">
                    <a href="index.php?action=message" class="<?= isset($_GET['action']) && $_GET['action'] === 'message' ? 'active' : '' ?>">
                        <img src="contenu/img/icon_message.png" alt="message icon" class="nav_icon">Messagerie <span class="count-message"></span>
                    </a>
                    <a href="index.php?action=dashboard" class="<?= isset($_GET['action']) && $_GET['action'] === 'dashboard' ? 'active' : '' ?>">
                        <img src="contenu/img/icon_user.jpg" alt="user icon" class="nav_icon">Mon compte
                    </a>
                    <?php if (isset($_SESSION['userId'])): ?>
                        <a href="index.php?action=logout">Déconnexion</a>
                    <?php else: ?>
                        <a href="index.php?action=connexion" class="<?= isset($_GET['action']) && $_GET['action'] === 'connexion' ? 'active' : '' ?>">Connexion</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
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