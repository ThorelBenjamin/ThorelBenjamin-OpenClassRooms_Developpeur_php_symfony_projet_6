<div class="update-book-page">
    <div class="update-book-container">
        <p><- retour</p>
        <h2>Modifier les informations</h2>
        <form action="index.php?action=updateBookInfo" method="post">
            <div class="update-first-section">
                <label>Photo</label>
                <img src="contenu/img/<?= Utils::format($book->getPicture()) ?>" alt="Book picture">
                <a href"#">Modifier la photo</a>
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
                    <option value="" disabled selected></option>
                    <option value="1">disponible</option>
                    <option value="0">non disponible</option>
                </select>
                <input type="hidden" name="id" value="<?= $book->getIdBook(); ?>" >
                <input type="submit" value="Valider" class="input-update">
            </div>
        </form>
    </div>
</div>