<!-- <?= var_dump($user); ?> -->

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
                    <p><?= count($book); ?> livres</p>
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
                    <?php foreach($book as $books) { ?>
                        <tr>
                            <td><img src="contenu/img/<?= $books->getPicture() ?>" alt="picture book"></td>
                            <td><span class="table-title"><?= $books->getTitle() ?></span></td>
                            <td><?= $books->getAuthor() ?></td>
                            <td><div><?= $books->getDescription() ?></div></td>
                        </tr>
                    <?php } ?>
                </table>
            </article>
        </section>
    </div>
</div>