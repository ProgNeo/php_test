<?php
require_once "TwigBaseController.php";

class SteinsGateInfoController extends SteinsGateController {
    public $template = "steins-gate_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_info'] = true;

        return $context;
    }
}