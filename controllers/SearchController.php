<?php
require_once "BaseAnimeTwigController.php";

class SearchController extends BaseAnimeTwigController
{
    public string $template = "search.twig";
    public string $title = "Поиск";

    public function getContext(): array
    {
        $context = parent::getContext();

        $genre = $_GET['genre'] ?? '';
        if ($genre == 'все') {
            $genre = '';
        }
        $title = $_GET['title'] ?? '';
        $description = $_GET['description'] ?? '';

        $sql = <<<EOL
SELECT id, title
FROM objects
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
  AND (:description = '' OR description like CONCAT('%', :description, '%'))
  AND (:genre = '' or genre = :genre)
EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("genre", $genre);
        $query->bindValue("description", $description);
        $query->execute();
        $context['objects'] = $query->fetchAll();

        return $context;
    }
}