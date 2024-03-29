<?php

class Views
{
    public function render($controller, $view, $data = [])
    {
        $controller = get_class($controller);
        if ($controller == "Home") {
            $view = "views/pages/" . $view . ".php";
        } else {
            $view = "views/pages/" . $controller . "/" . $view . ".php";
        }

        require_once "views/layouts/header.php";
        require $view;
        require_once "views/layouts/footer.php";
    }
}
