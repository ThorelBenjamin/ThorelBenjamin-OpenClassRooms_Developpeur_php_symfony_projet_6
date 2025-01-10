
<div class="userpage">
    <div class="userpage-container">
        <section>
            <article class="userpage-info">
                <img src="contenu/img/<?= $user->getUserLogo() ?>" alt="">
                <hr />
                <h4><?= htmlspecialchars($user->getUsername()); ?></h4>
                <p>Membre depuis <?= $accountDuration ?></p>
                <p>BIBLIOTHEQUE</p>
                <div class="userpage-book-count">
                    <img src="contenu/img/book_icon_dashboard" alt="icone de livre">
                    <p><?= count($books); ?> livres</p>
                </div>
                <form action="index.php?action=message" method="post">
                    <input type="hidden" name="senderId" value="<?= Utils::format($user->getUserId()) ?>">
                    <input type="submit" value="Envoyer un message" class="userpage-button">
                </form>
            </article>
        </section>
        <section>
        <article>
        <table>
            <tr>
                <th>PHOTO</th>
                <th>TITRE</th>
                <th>AUTEUR</th>
                <th>DESCRIPTION</th>
            </tr>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td><img src="contenu/img/<?= $book->getPicture() ?>" alt="picture book"></td>
                    <td><span class="table-title"><?= $book->getTitle() ?></span></td>
                    <td><?= $book->getAuthor() ?></td>
                    <td><div><?= $book->getDescription() ?></div></td>
                </tr>
            <?php } ?>
        </table>

        <!-- Navigation de pagination -->
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="index.php?action=userPage&id=<?= $user->getUserId() ?>&page=<?= $currentPage - 1 ?>" class="pagination-link" aria-label="Page précédente"></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="index.php?action=userPage&id=<?= $user->getUserId() ?>&page=<?= $i ?>" class="pagination-link <?= $i === $currentPage ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="index.php?action=userPage&id=<?= $user->getUserId() ?>&page=<?= $currentPage + 1 ?>" class="pagination-link" aria-label="Page suivante"></a>
            <?php endif; ?>
        </div>
    </article>
        </section>
    </div>
</div>