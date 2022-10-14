<?php

class BaseAnimeTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT DISTINCT genre FROM objects ORDER BY 1");
        $types = $query->fetchAll();
        $context['genres'] = $types;

        return $context;
    }
}