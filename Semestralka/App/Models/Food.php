<?php

namespace App\Models;

use App\Core\Model;

class Food extends Model
{
    protected int $food_id;
    protected string $food_name = "";
    protected int $type_id;
    protected string $ingredients = "";
    protected float $price;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getFoodId(): int
    {
        return $this->food_id;
    }

    /**
     * @param int $food_id
     */
    public function setFoodId(int $food_id): void
    {
        $this->food_id = $food_id;
    }

    /**
     * @return string
     */
    public function getFoodName(): string
    {
        return $this->food_name;
    }

    /**
     * @param string $food_name
     */
    public function setFoodName(string $food_name): void
    {
        $this->food_name = $food_name;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @param int $type_id
     */
    public function setTypeId(int $type_id): void
    {
        $this->type_id = $type_id;
    }

    /**
     * @return string
     */
    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    /**
     * @param string $ingredients
     */
    public function setIngredients(string $ingredients): void
    {
        $this->ingredients = $ingredients;
    }
}