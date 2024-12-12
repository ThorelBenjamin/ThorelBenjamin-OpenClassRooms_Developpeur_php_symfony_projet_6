<div class="exchange-page">
    <div class="exchange-header">
        <h2>Nos livres à l'échange</h2>
        <div class="exchange-search">
            <div class="search-logo">
                 <img src="contenu/img/search_logo.png" alt="search logo">
            </div>
            <input type="search" id="search" name="search" placeholder="Rechercher un livre"/>
        </div>
        
        
        
    </div>

    
    <div class="exchange-card">
            <?php foreach($books as $book) { ?>
                <a href="index.php?action=showBook&id=<?= $book->getIdBook() ?>">
                    <article class="card">
                        <img src="contenu/img/<?= $book->getPicture() ?>" alt="">
                        <div>
                            <h4><?= $book->getTitle() ?></h4>
                            <p><?= $book->getAuthor() ?></p>
                            <p>vendu par : <?= $book->getUsername() ?></p>
                        </div>
                    </article>
                </a>
            <?php } ?>
        </div>
</div>
