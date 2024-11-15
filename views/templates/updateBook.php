<div class="update-book-page">
    <div class="update-book-container">
        <p class="update-book-back">retour</p>
        <h2 class="update-book-title">Modifier les informations</h2>
        <form action="index.php?action=updateBookInfo" method="post" class="update-book-form">
            <div class="update-first-section">
                <label>Photo</label>
                <img src="contenu/img/<?= Utils::format($book->getPicture()) ?>" alt="Book picture" class="update-book-picture">
                <a>Modifier la photo</a>
            </div>
            <div class="update-second-section">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="input-form-update" value="<?= Utils::format($book->getTitle()) ?>">

                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" class="input-form-update" value="<?= Utils::format($book->getAuthor()) ?>">

                <label for="description">Message</label>
                <textarea id="description" name="description"><?= Utils::format($book->getDescription()) ?></textarea>
                
                <label for="status">Disponibilité</label>
                <select class="select-update" name="status">
                    <option value="" disabled selected><?= Utils::format($book->getStatus()) ?></option>
                    <option value="disponible">disponible</option>
                    <option value="non disponible">non disponible</option>
                </select>
                <input type="submit" value="Valider" class="input-update">
            </div>
        </form>
    </div>
</div>