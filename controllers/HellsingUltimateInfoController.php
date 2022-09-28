<?php
require_once "TwigBaseController.php";

class HellsingUltimateInfoController extends HellsingUltimateController {
    public $template = "hellsing-ultimate_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_info'] = true;

        return $context;
    }
}