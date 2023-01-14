<?php

namespace App\Models;

use App\Core\Model;

class Cart extends Model
{
    protected int $id;
    protected int $profile;
    protected int $food;
    protected int $count = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProfile(): int
    {
        return $this->profile;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param int $profile
     */
    public function setProfile(int $profile): void
    {
        $this->profile = $profile;
    }

    /**
     * @param int $food
     */
    public function setFood(int $food): void
    {
        $this->food = $food;
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