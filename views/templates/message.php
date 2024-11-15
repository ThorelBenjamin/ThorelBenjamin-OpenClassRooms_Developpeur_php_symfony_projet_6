<div class="message-page">
    <div class="message-page-container">
        <section class="message-info-section">
            <h2 class="message-info-title">Messagerie</h2>
            <?php foreach($message as $messages) { ?>
                <a href="index.php?action=message&senderId=<?= $messages->getSenderId() ?>">
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
            <?php if ($user !== null): ?>
                <img src="contenu/img/<?= $user->getUserLogo() ?>" alt="sent user logo" class="message-user-picture">
                <h3><?= $user->getUsername() ?></h3>
            <?php endif; ?>
            </div>
            <article class="core-message">
                <div class="core-message-container">
                    <?php foreach($messageSender as $messageSenders) { 
                        $isUserSender = $messageSenders->getSenderId() === $_SESSION['userId'];
                    ?>
                        <div class="core-message-content <?= $isUserSender ? 'message-sent' : 'message-received' ?>">
                            <img src="contenu/img/<?= $messageSenders->getUserLogo() ?>" alt="sent user logo" class="message-core-picture <?= $isUserSender ? 'message-sent-picture' : 'message-received-picture' ?>">
                            <p><?= $messageSenders->getFormattedSentAt() ?></p>
                        </div>   
                        <p class="core-message-text <?= $isUserSender ? 'message-sent-text' : 'message-received' ?>"><?= $messageSenders->getMessageText() ?></p>
                    <?php } ?>
                    
                    <?php if ($user !== null): ?>
                        <form action="index.php?action=addMessage" method="post" class="message-form">

                            <input type="text" name="messageText" id="messageText" class="input-form-message" placeholder="Tapez votre message ici">
                            <input type="hidden" name="recipientId" value="<?= $user->getUserId(); ?>" >                        

                            <input type="submit" value="Envoyé" class="submit-form-message">
                        </form>
                    <?php endif; ?>
                </div>
            </article>
        </section>
    </div>
</div>

<!-- <?= var_dump($_POST); ?>
<?= var_dump($messageSender); ?> -->