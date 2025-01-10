<div class="dashboard">
    <div class="dashboard-container">
        <h2>Mon compte</h2>
        <div class="dashboard-first-section">
                <article class="dasboard-user">
                    <img src="contenu/img/<?= Utils::format($user->getUserLogo()) ?>" alt="">
                    <a href="#">modifier</a>
                    <hr />
                    <h4><?= Utils::format($user->getUsername()); ?></h4>
                    <p>Membre depuis <?= $accountDuration ?></p>
                    <p>BIBLIOTHEQUE</p>
                    <div class="dasboard-book-count">
                        <img src="contenu/img/book_icon_dashboard" alt="icone de livre">
                        <p><?= count($books); ?> livres</p>
                    </div>
                </article>
                <article class="dasboard-info">
                    <h4>Vos informations personnelles</h4>
                    <form action="index.php?action=updateUser" method="post">
                        <label for="email">Adresse email</label>
                        <input type="text" name="email" id="email" value="<?= Utils::format($user->getEmail()); ?>" class="input-form-dashboard">

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="input-form-dashboard">

                        <label for="username">Pseudo</label>
                        <input type="text" name="username" id="username" value="<?= Utils::format($user->getUsername()); ?>" class="input-form-dashboard">

                        <!-- Champ caché pour l'ID utilisateur -->
                        <input type="hidden" name="user_id" value="<?= Utils::format($user->getUserId()); ?>" >
                        <input type="submit" value="Enregistrer" class="button-info-save">
                    </form>
                </article>
        </div>
        
        <div class="dashboard-second-section">
            <article>
                <table>
                    <tr>
                        <th>PHOTO</th>
                        <th>TITRE</th>
                        <th>AUTEUR</th>
                        <th>DESCRIPTION</th>
                        <th>DISPONIBILITE</th>
                        <th>ACTION</th>
                        <th><span class="visually-hidden">Actions supplémentaires</span></th>
                    </tr>
                    <?php foreach($books as $book) { ?>
                        <tr>
                            <td><img src="contenu/img/<?= Utils::format($book->getPicture()) ?>" alt="picture book"></td>
                            <td><span class="table-title"><?= Utils::format($book->getTitle()) ?></span></td>
                            <td><?= $book->getAuthor() ?></td>
                            <td><div><?= $book->getDescription() ?></div></td>
                            <td><span class=" statut <?= $book->getStatus() === 'disponible' ? 'statut-on' : 'statut-off' ?>"><?= Utils::format($book->getStatus()) ?></span></td>
                            <td><a href="index.php?action=updateBook&id=<?= Utils::format($book->getIdBook()) ?>">Éditer</a></td>
                            <td><a href="index.php?action=deleteBook&id=<?= Utils::format($book->getIdBook()) ?>">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </article>
        </div>
    </div>
</div>

