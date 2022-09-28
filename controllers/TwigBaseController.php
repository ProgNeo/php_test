<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = "";
    public $template = "";
    protected \Twig\Environment $twig;
    
    public function __construct($twig)
    {
        $this->twig = $twig;
    }
    
    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title;
        $context['menu'] = [
            [
                "title" => "Home",
                "url" => "/",
            ],
            [
                "title" => "Steins;Gate",
                "url" => "/steins-gate",
            ],
            [
                "title" => "Hellsing Ultimate",
                "url" => "/hellsing-ultimate",
            ],
            [
                "title" => "Evangelion",
                "url" => "/evangelion"
            ]
        ];

        return $context;
    }
    
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}