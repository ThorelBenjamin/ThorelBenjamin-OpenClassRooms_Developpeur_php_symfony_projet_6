<?php

/**
 * Cette classe génère les vues en fonction de ce que chaque contrôlleur lui passe en paramètre. 
 */
class View 
{
    private string $title;

    public function __construct(string $title) 
    {
        $this->title = $title;
    }

    /**
     * Rendu de la vue.
     * Cette méthode récupère le chemin de la vue, génère le contenu avec les paramètres donnés, et l'affiche.
     * @param string $viewName Le nom de la vue à rendre.
     * @param array $params Paramètres à passer à la vue pour personnaliser son contenu.
     * @return void
     */
    public function render(string $viewName, array $params = []) : void 
    {
        $viewPath = $this->getViewPath($viewName);
        $content = $this->renderTemplate($viewPath, $params);
        $title = $this->title;

        ob_start();
        require MAIN_VIEW_PATH;
        echo ob_get_clean();
    }

    /**
     * Génère le contenu de la vue en extrayant les paramètres dans le contexte de la vue.
     * 
     * @param string $viewPath Le chemin absolu du fichier de vue.
     * @param array $params Paramètres à extraire et à rendre disponibles dans la vue.
     * @return string Le contenu rendu de la vue.
     * @throws Exception Si le fichier de vue n'est pas trouvé, une exception est lancée.
     */
    private function renderTemplate(string $viewPath, array $params) : string
    {
        if (!file_exists($viewPath)) {
            throw new Exception(sprintf("La vue '%s' est introuvable.", $viewPath));
        }

        extract($params);
        ob_start();
        require $viewPath;
        return ob_get_clean();
    }

    /**
     * Récupère le chemin complet du fichier de la vue à partir de son nom.
     * 
     * @param string $viewName Le nom de la vue (sans extension).
     * @return string Le chemin complet du fichier de la vue.
     */
    private function getViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}