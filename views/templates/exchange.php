<div class="exchange-page">
    <div class="exchange-header">
        <h2>Nos livres à l'échange</h2>
        <div class="exchange-search">
            <div class="search-logo">
                 <img src="contenu/img/search_logo.png" alt="search logo">
            </div>
            <form method="GET" action="index.php">
                <input type="hidden" name="action" value="exchange">
                <label for="search" class="visually-hidden">Rechercher un livre</label>
                <input type="search" id="search" name="search" placeholder="Rechercher un livre" value="<?= htmlspecialchars($query) ?>"/>
            </form>
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
