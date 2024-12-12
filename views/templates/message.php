<div class="message-page">
    <div class="message-page-container">
        <section class="message-info-section">
            <h2>Messagerie</h2>
            <?php foreach($message as $messages) { ?>
                <a href="index.php?action=message&senderId=<?= $messages->getSenderId() ?>">
                    <div>
                        <img src="contenu/img/<?= $messages->getUserLogo() ?>" alt="picture user" class="user-picture">
                        <div class="message-user-card">
                            <div>
                                <h3><?= $messages->getUsername() ?></h3>
                                <p><?= $messages->getFormattedSentAt() ?></p>
                            </div>
                            <p><?= $messages->getMessageText() ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </section>
        <section class="message-text-section">
            <div class="message-user-sent">
            <?php if ($user !== null): ?>
                <img src="contenu/img/<?= $user->getUserLogo() ?>" alt="sent user logo" class="user-picture">
                <h3><?= $user->getUsername() ?></h3>
            <?php endif; ?>
            </div>
            <article>
                <div class="core-message">
                    <?php foreach($messageSender as $messageSenders) { 
                        $isUserSender = $messageSenders->getSenderId() === $_SESSION['userId'];
                    ?>
                        <div class="<?= $isUserSender ? 'message-sent' : 'message-received' ?>">
                            <img src="contenu/img/<?= $messageSenders->getUserLogo() ?>" alt="sent user logo" class="<?= $isUserSender ? 'message-sent-picture' : 'message-received-picture' ?>">
                            <p><?= $messageSenders->getFormattedSentAt() ?></p>
                        </div>   
                        <p class="core-message-text <?= $isUserSender ? 'message-sent-text' : 'message-received' ?>"><?= $messageSenders->getMessageText() ?></p>
                    <?php } ?>
                    
                    <?php if ($user !== null): ?>
                        <form action="index.php?action=addMessage" method="post">

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
