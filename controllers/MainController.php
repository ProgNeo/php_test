<?php
require_once "BaseAnimeTwigController.php";

class MainController extends BaseAnimeTwigController
{
    public string $template = "main.twig";
    public string $title = "Home";

    public function getContext(): array
    {
        $context = parent::getContext();

        if (isset($_GET['genre'])) {
            $query = $this->pdo->prepare("SELECT * FROM objects WHERE genre = :genre");
            $query->bindValue("genre", $_GET['genre']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM objects");
        }

        $context['anime_objects'] = $query->fetchAll();

        return $context;
    }
}