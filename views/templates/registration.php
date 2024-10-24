<section class="connexion-page">
    <article>
        <h2 class="title-connexion">inscription</h2>
        <form action="index.php?action=addUser" method="post" class="connexion-form">
            <label>Pseudo</label>
            <input type="text" name="username" id="username">

            <label>Adresse email</label>
            <input type="text" name="email" id="email">

            <label>Mot de passe</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="S'inscrire">
            <p>Déjà inscrit ? <a href="index.php?action=connexion">Connectez-vous</a></p>
        </form>
        
    </article>
    <article class="connexion-bookstore">
        <img src="contenu/img/store-book.png" alt="book store">
    </article>
</section>
