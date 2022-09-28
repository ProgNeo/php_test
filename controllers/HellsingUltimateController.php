<?php
require_once "TwigBaseController.php";

class HellsingUltimateController extends TwigBaseController {
    public $template = "choose_text.twig";
    public $title = "Hellsing Ultimate";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['link'] = "/hellsing-ultimate";

        return $context;
    }
}