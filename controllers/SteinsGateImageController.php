<?php
require_once "TwigBaseController.php";

class SteinsGateImageController extends SteinsGateController {
    public $template = "image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['image'] = "/images/1.jpg";
        $context['is_image'] = true;

        return $context;
    }
}