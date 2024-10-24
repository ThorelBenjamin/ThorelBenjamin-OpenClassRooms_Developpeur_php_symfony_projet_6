<div class="exchange-page">
    <div class="exchange-header">
        <h2 class="exchange-title">Nos livres à l'échange</h2>
        <input type="search" id="search" name="search" placeholder="Rechercher un livre"/>
    </div>

    
    <div class="book-card-exchange">
            <?php foreach($books as $book) { ?>
                <article class="card">
                    <img src="contenu/img/<?= $book->getPicture() ?>" alt="" class="card-picture">
                    <div class="card-content">
                        <h4 class="card-title"><?= $book->getTitle() ?></h4>
                        <p class="card-subtitle"><?= $book->getAuthor() ?></p>
                        <p class="card-seller">vendu par : <?= $book->getUsername() ?></p>
                    </div>
                </article>
            <?php } ?>
        </div>
</div>
