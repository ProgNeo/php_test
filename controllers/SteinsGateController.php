<?php
require_once "TwigBaseController.php";

class SteinsGateController extends TwigBaseController {
    public $template = "choose_text.twig";
    public $title = "Steins;Gate";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['link'] = "/steins-gate";

        return $context;
    }
}