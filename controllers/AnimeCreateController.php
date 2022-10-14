<?php
require_once "BaseAnimeTwigController.php";

class AnimeCreateController extends BaseAnimeTwigController 
{
    public string $template = "create.twig";
    public string $title = "Создание";


    public function post(array $context) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $genre = $_POST['genre'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        
        move_uploaded_file($tmp_name, "../public/media/$name");

        $sql = <<<EOL
INSERT INTO objects(title, description, genre, info, image)
VALUES(:title, :description, :genre, :info, :image_url)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("genre", $genre);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        
        $query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}