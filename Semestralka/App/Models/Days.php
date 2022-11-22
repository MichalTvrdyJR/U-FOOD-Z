<?php

namespace App\Models;

use App\Core\Model;

class Days extends Model
{
    protected int $id;
    protected string $name = "";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}