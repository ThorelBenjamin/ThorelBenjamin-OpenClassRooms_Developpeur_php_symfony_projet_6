<div class="dashboard">
    <div class="dashboard-container">
        <h2 class="dashboard-title">Mon compte</h2>
        <div class="dashboard-first-section">
                <article class="dasboard-user">
                    <img src="contenu/img/<?= $user->getUserLogo() ?>" alt="" class="dashboard-user-picture">
                    <a href=# class="user-picture-update">modifier</a>
                    <div class="dashboard-line"></div>
                    <h4 class="user-username"><?= htmlspecialchars($user->getUsername()); ?></h4>
                    <p class="user-seniority">Menbre depuis </p>
                    <p>BIBLIOTHEQUE</p>
                    <p>N livres</p>
                </article>
                <article class="dasboard-info">
                    <h4 class="dashboard-info-title">Vos informations personnelles</h4>
                    <form action="index.php?action=updateUser" method="post" class="dashboard-info-form">
                        <label>Adresse email</label>
                        <input type="text" name="email" id="email" value="<?= htmlspecialchars($user->getEmail()); ?>" class="input-form-dashboard">

                        <label>Mot de passe</label>
                        <input type="password" name="password" id="password" class="input-form-dashboard">

                        <label>Pseudo</label>
                        <input type="text" name="username" id="username" value="<?= htmlspecialchars($user->getUsername()); ?>" class="input-form-dashboard">

                        <!-- Champ caché pour l'ID utilisateur -->
                        <input type="hidden" name="user_id" value="<?= $user->getUserId(); ?>" >
                        <input type="submit" value="Enregistrer" class="button-info-save">
                    </form>
                </article>
        </div>
        
        <div class="dashboard-second-section">
            <article class="dasboard-library">
                <table class="dashboard-table">
                    <tr>
                        <th>PHOTO</th>
                        <th>TITRE</th>
                        <th>AUTEUR</th>
                        <th>DESCRIPTION</th>
                        <th>DISPONIBILITE</th>
                        <th>ACTION</th>
                        <th></th>
                    </tr>
                    <?php foreach($books as $book) { ?>
                        <tr>
                            <td class="dashboard-table-picture"><img src="contenu/img/<?= $book->getPicture() ?>" alt="picture book" class="table-picture"></td>
                            <td class="dashboard-table-title"><?= $book->getTitle() ?></td>
                            <td class="dashboard-table-author"><?= $book->getAuthor() ?></td>
                            <td class="dashboard-table-description"><?= $book->getDescription() ?></td>
                            <td class="dashboard-table-available"><?= $book->getStatus() ?></td>
                            <td class="dashboard-table-edite"><a href="index.php?action=updateBook&id=<?= $book->getIdBook() ?>">Éditer</a></td>
                            <td class="dashboard-table-delete"><a>Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </article>
        </div>
    </div>
</div>

