<?php

namespace App\Models;

use App\Core\Model;

class Cart extends Model
{
    protected int $id_profile;
    protected int $id_food;
    protected int $count = 0;

    /**
     * @return int
     */
    public function getId_Profile(): int
    {
        return $this->id_profile;
    }

    /**
     * @return int
     */
    public function getId_Food(): int
    {
        return $this->id_food;
    }

    /**
     * @param int $id_profile
     */
    public function setId_Profile(int $id_profile): void
    {
        $this->id_profile = $id_profile;
    }

    /**
     * @param int $id_food
     */
    public function setId_Food(int $id_food): void
    {
        $this->id_food = $id_food;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }
}