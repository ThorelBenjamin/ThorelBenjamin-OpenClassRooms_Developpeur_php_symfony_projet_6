<div class="connexion-page">
    <section class="connexion-page-section">
        <article>
            <h2 class="title-connexion">inscription</h2>
            <form action="index.php?action=addUser" method="post" class="connexion-form">
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" class="input-form">

                <label for="email">Adresse email</label>
                <input type="text" name="email" id="email" class="input-form">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="input-form">

                <input type="submit" value="S'inscrire" class="submit-form-connection">
                <p>Déjà inscrit ? <a href="index.php?action=connexion">Connectez-vous</a></p>
            </form>
            
        </article>
        <article class="connexion-bookstore">
            <img src="contenu/img/store-book.png" alt="book store">
        </article>
    </section>
</div>