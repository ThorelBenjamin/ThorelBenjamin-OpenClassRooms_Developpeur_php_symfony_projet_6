<div class="connexion-page">
    <section class="connexion-page-section">
        <article>
            <h2 class="title-connexion">Connection</h2>
            <form action="index.php?action=connectUser" method="post" class="connexion-form">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="username" id="username" class="input-form">

                <label>Password</label>
                <input type="password" name="password" id="password" class="input-form">

                <input type="submit" value="Connection" class="input-form">
                <p>Pas de compte ? <a href="index.php?action=registration" class="form-link">Inscrivez-vous</a></p>
            </form>
            
        </article>
        <article class="connexion-bookstore">
            <img src="contenu/img/store-book.png" alt="book store">
        </article>
    </section>
</div>
