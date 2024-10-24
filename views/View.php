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

    public function render(string $viewName, array $params = []) : void 
    {
        $viewPath = $this->getViewPath($viewName);
        $content = $this->renderTemplate($viewPath, $params);
        $title = $this->title;

        ob_start();
        require MAIN_VIEW_PATH;
        echo ob_get_clean();
    }

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

    private function getViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}