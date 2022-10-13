<?php
require_once "BaseAnimeTwigController.php";

class ObjectController extends BaseAnimeTwigController
{
    public string $template = "choose_text.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT *, id FROM anime_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'image') {
                $context['image'] = $data['image'];
            }
            else {
                $context['info'] = $data['info'];
            }
        }

        $context['id'] = $data['id'];
        $context['title'] = $data['title'];
        $context['description'] = $data['description'];

        return $context;
    }

    public function get(){
        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'image') {
                $this->template = "image.twig";
            }
            else {
                $this->template = "info.twig";
            }
        }
        parent::get();
    }
}