<?php
    /**
     * Affichage de Liste des articles. 
     */
?>

<section class="join">
    <div class="join-container">
        <div class="join-text">
            <h2 class="join-title">Rejoingnez nos lecteurs pasionnés</h2>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
            <button class="button-discover">Découvrir</button>
        </div>
            <img src="contenu/img/hamza-nouasria.png" alt="hamza nouasria" class="join-img">
    </div>
</section>

<section class="last-add">
    <div class="last-add-container">
        <h3 class="add-title">Les derniers livres ajoutés</h3>
        <div class="book-card">
            <?php foreach($books as $book) { ?>
                <article class="card">
                    <a href="index.php?action=showBook&id=<?= $book->getIdBook() ?>">       
                        <img src="contenu/img/<?= $book->getPicture() ?>" alt="" class="card-picture">
                        <div class="card-content">
                            <h4 class="card-title"><?= $book->getTitle() ?></h4>
                            <p class="card-subtitle"><?= $book->getAuthor() ?></p>
                            <p class="card-seller">vendu par : <?= $book->getUsername() ?></p>
                        </div>
                    </a>
                </article>
            <?php } ?>
        </div>
        <button class="button-last-add">Voir tout les livres</button>
    </div>
</section>

<section class="about">
    <h3 class="about-title">Comment ça marche ?</h3>
    <p class="about-text">Echanger des livres avec TromTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
    <div class="about-card">
        <p class="about-text-card">Inscrivez-vous</br>gratuitement sur<br>notre plateforme.</p>
        <p class="about-text-card">Ajoutez les livres que vous</br>souhaitez échanger à</br>votre profil.</p>
        <p class="about-text-card">Parcourez les livres</br>disponnibles chez d'autres</br>membres.</p>
        <p class="about-text-card">Proposez un échange et</br>discutez avec d'autres</br>passionnés de lecture.</p>
    </div>
    <button class="button-about">Voir tous les livres</button>
    <img src="contenu/img/home-book.png" alt="home book" class="about-img">
    <div class="about-value">
        <h4 class="about-value-title">Nos valeurs</h4>
        <div class="about-text-content">
            <p>Chez Tom Troc, nous mettons l'accent sur le</br>partage, la découverte et la communauté. Nos</br>valeurs sont ancrées dans notre passion pour les</br>livres et notre désir de créer des liens entre les</br>lecteurs. Nous croyons en la puissance des histoires</br>pour rassembler les gens et inspirer des</br>conversations enrichissantes.</br></br></p>
            <p>Notre association a été fondée avec une conviction</br>profonde : chaque livre mérite d'être lu et partagé.</br></br></p>
            <p>Nous sommes passionnés par la création d'une</br>plateforme conviviale qui permet aux lecteurs de se</br>connecter, de partager leurs découvertes littéraires</br>et d'échanger des livres qui attendent patiemment</br>sur les étagères.</p>
        </div>
        <div class="about-value-signature">
                <p>L'équipe Tom Troc</p>
                <img src="contenu/img/heart.png" alt="heart signature" class="about-heart-signature">
        </div>
    </div>
</section>