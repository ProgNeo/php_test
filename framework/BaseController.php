<?php

abstract class BaseController
{
    public PDO $pdo;
    public array $params;

    public function setPDO(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getContext(): array
    {
        return [];
    }

    abstract public function get();
}