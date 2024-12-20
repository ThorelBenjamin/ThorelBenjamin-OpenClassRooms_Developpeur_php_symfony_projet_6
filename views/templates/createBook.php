<div class="update-book-page">
    <div class="update-book-container">
        <p><- retour</p>
        <h2>Création d'un nouveau livre</h2>
        <form action="index.php?action=addBook" method="post">
            <div class="update-first-section">
                <label>Photo</label>
                <img src="contenu/img/Livre_template.jpg" alt="Book picture">
                <a href"#">Ajouter une photo</a>
            </div>
            <div class="update-second-section">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="input-form-update" value="">

                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" class="input-form-update" value="">

                <label for="description">Message</label>
                <textarea id="description" name="description"></textarea>
                
                <label for="status">Disponibilité</label>
                <select class="select-update" name="status">
                    <option value="" disabled selected></option>
                    <option value="1">disponible</option>
                    <option value="0">non disponible</option>
                </select>
                <input type="submit" value="Valider" class="input-update">
            </div>
        </form>
    </div>
</div>