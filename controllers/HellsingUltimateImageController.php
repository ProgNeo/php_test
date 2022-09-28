<?php
require_once "TwigBaseController.php";

class HellsingUltimateImageController extends HellsingUltimateController {
    public $template = "image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['image'] = "/images/2.jpg";
        $context['is_image'] = true;

        return $context;
    }
}