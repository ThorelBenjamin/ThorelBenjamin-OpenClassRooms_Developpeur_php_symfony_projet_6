<div class="message-page">
    <div class="message-page-container">
        <section class="message-info-section">
            <h2 class="message-info-title">Messagerie</h2>
            <?php foreach($message as $messages) { ?>
                <a href="index.php?action=message&senderid=<?= $messages->getSenderId() ?>">
                    <div class="message-section-card">
                        <img src="contenu/img/<?= $messages->getUserLogo() ?>" alt="picture user" class="message-user-picture">
                        <div class="message-user-card">
                            <div class="message-user-info">
                                <h3 class="message-user-username"><?= $messages->getUsername() ?></h3>
                                <p><?= $messages->getFormattedSentAt() ?></p>
                            </div>
                            <p class="message-user-text"><?= $messages->getMessageText() ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </section>
        <section class="message-text-section">
            <div class="message-user-sent">
                <img src="contenu/img/<?= $user->getUserLogo() ?>" alt="sent user logo" class="message-user-picture">
                <h3><?= $user->getUsername() ?></h3>
            </div>
            <article>
                <!-- <div class="core-message">
                    <img src="" alt=""><p>jour.mois heure:minute</p>
                    <p>message</p>
                </div> -->
            </article>
        </section>
    </div>
</div>

<!-- <?= var_dump($_POST); ?>-->
<?= var_dump($message); ?> 
