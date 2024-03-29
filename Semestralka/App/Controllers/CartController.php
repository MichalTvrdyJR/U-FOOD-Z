<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Cart;
use App\Models\Daily_menu;
use App\Models\Days;
use App\Models\Food;
use App\Models\Time_interval;
use App\Core\IAuthenticator;


class CartController extends AControllerBase
{
    public function authorize(string $action)
    {
        return true;
        //return parent::authorize($action); // TODO: Change the autogenerated stub
    }

    public function index(): Response
    {
        $data = Cart::getAll();
        $n_data = ['message' => "", 'price' => 0];
        $suma = 0;
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() == "Admin") {
            $n_data['message'] = "For your account is cart not able";
        } else if ($this->app->getAuth()->isLogged()){
            $cislo = 0;
            foreach ($data as $column) {
                if ($column->getProfile() == $this->app->getAuth()->getLoggedUserId()) {
                    array_push($n_data, $column);
                    $cislo = $cislo + 1;
                    $suma = $suma + (Food::getOne($column->getFood())->getPrice() * $column->getCount());
                }
            }
            if ($cislo == 0) {
                $n_data['message'] = "Your cart is empty";
            }
        } else {
            $n_data['message'] = "To start shopping you need to be log in";
        }
        $n_data['price'] = $suma;
        return $this->html($n_data);
    }

    public function add(): Response
    {
        $id = explode("-", $this->request()->getValue("id"));
        $food_type_id = $id[0];
        $food_id = $id[1];
        $url = "?c=food&a=index&id=" . $food_type_id;
        $food = Food::getOne($food_id);
        if ($food == null) {
            return $this->redirect($url);
        }
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() != "Admin") {
            $found = false;
            $data = Cart::getAll();
            foreach ($data as $column) {
                if ($column->getProfile() == $this->app->getAuth()->getLoggedUserId() && $column->getFood() ==$food_id) {
                    $column->setCount($column->getCount() + 1);
                    $column->save();
                    $found = true;
                }
            }
            if (!$found) {
                $cart_item = new Cart();
                $cart_item->setProfile($this->app->getAuth()->getLoggedUserId());
                $cart_item->setFood($food_id);
                $cart_item->setCount(1);
                $cart_item->save();
            }
        }

        return $this->redirect($url);
    }

    public function add_cart(): Response
    {
        $cart = Cart::getOne($this->request()->getValue("id"));
        $food_id = $cart->getFood();
        $url = "?c=cart";
        $food = Food::getOne($food_id);
        if ($food == null) {
            return $this->redirect($url);
        }
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() != "Admin") {
            if ($cart->getProfile() == $this->app->getAuth()->getLoggedUserId()) {
                    $cart->setCount($cart->getCount() + 1);
                    $cart->save();
            }
        }

        return $this->redirect($url);
    }

    public function delete_cart(): Response
    {
        $cart = Cart::getOne($this->request()->getValue("id"));
        $food_id = $cart->getFood();
        $url = "?c=cart";
        $food = Food::getOne($food_id);
        if ($food == null) {
            return $this->redirect($url);
        }
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() != "Admin") {
            if ($cart->getProfile() == $this->app->getAuth()->getLoggedUserId()) {
                if ($cart->getCount() > 1) {
                    $cart->setCount($cart->getCount() - 1);
                    $cart->save();
                } else {
                    $cart->delete();
                };
            }
        }

        return $this->redirect($url);
    }
}
