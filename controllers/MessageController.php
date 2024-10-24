<?php 

class MessageController 
{
    
    public function showMessage() : void
    {
        $view = new View("Messagerie");
        $view->render("message");
    }

}