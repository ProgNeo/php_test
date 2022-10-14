<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require_once "BaseController.php";

class TwigBaseController extends BaseController
{
    public string $title = "";
    public string $template = "";
    protected Environment $twig;

    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['title'] = $this->title;

        return $context;
    }

    public function get(array $context)
    {
        try {
            echo $this->twig->render($this->template, $context);
        } catch (LoaderError|RuntimeError|SyntaxError) {
        }
    }
}