<?php
require_once "BaseAnimeTwigController.php";

class Controller404 extends BaseAnimeTwigController
{
    public string $template = "404.twig";
    public string $title = "Страница не найдена";

    public function get(array $context)
    {
        http_response_code(404);
        parent::get($context);
    }
}
