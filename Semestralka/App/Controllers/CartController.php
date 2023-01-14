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
        $n_data = ['message' => ""];
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() == "Admin") {
            $n_data['message'] = "For your account is cart not able";
        } else if ($$this->app->getAuth()->isLogged()){
            $cislo = 0;
            foreach ($data as $column) {
                if ($column->getProfile() == $this->app->getAuth()->getLoggedUserId()) {
                    array_push($n_data, $column);
                    $cislo = $cislo + 1;
                }
            }
            if ($cislo == 0) {
                $n_data['message'] = "Your cart is empty";
            }
        } else {
            $n_data['message'] = "To start shopping you need to be log in";
        }

        return $this->html($n_data);
    }

    public function add(): Response
    {
        $id = explode("-", $this->request()->getValue("id"));
        $food_type_id = $id[0];
        $food_id = $id[1];
        $food = Food::getOne($food_id);
        if ($food == null) {
            $url = "?c=food&a=index&id=" . $food_type_id;
            return $this->redirect($url);
        }
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() != "Admin") {
            $data = Cart::getAll();
            foreach ($data as $column) {
                if ($column->getProfile() == $this->app->getAuth()->getLoggedUserId() && $column->getFood() ==$food_id) {
                    $column->setCount($column->getCount() + 1);
                } else {
                    $cart_item = new Cart();
                    $cart_item->setProfile($this->app->getAuth()->getLoggedUserId());
                    $cart_item->setFood($food_id);
                    $cart_item->setCount(1);
                    $cart_item->save();
                }
            }
        }

        $url = "?c=food&a=index&id=" . $food_type_id;
        return $this->redirect($url);
    }

    public function edit(): Response
    {
        $message = "";
        $menu_id = $this->request()->getValue("id");
        $menu = Daily_menu::getOne($menu_id);
        $data = $this->request()->getPost();
        if ($menu == null) {
            return $this->redirect("?c=daily_menu");
        }

        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() == "Admin") {
            if (isset($data["day"]) && isset($data["name"]) && isset($data["ingredients"]) && isset($data["price"])) {
                if (filter_var($data["price"], FILTER_VALIDATE_FLOAT) === false || $data["price"] > 0) {
                    $message = "Zle zadaná suma";
                } else {
                    $dayID = $this->validDay($data["day"]);
                    if ($dayID == -1) {
                        $message = "Zle zadaný deň";
                    } else {
                        $menu->setDay($dayID);
                        $menu->setName($data["name"]);
                        $menu->setIngredients($data["ingredients"]);
                        $menu->setPrice($data["price"]);
                        $menu->save();
                        return $this->redirect("?c=daily_menu");
                    }
                }
            }
        } else {
            $message = "Nie ste autorizovaný meniť veci";
        }

        $den = Days::getOne($menu->getDay())->getName();
        $data = ['nadpis' => "Edit", 'message' => $message, 'name' => $menu->getName(), 'day' => $den, 'ingredients' => $menu->getIngredients(), 'price' => $menu->getPrice()];
        return $this->html($data, "add");
    }

    public function delete(): Response
    {
        if ($this->app->getAuth()->isLogged() && $this->app->getAuth()->getLoggedUserName() == "Admin") {
            $menu_id = $this->request()->getValue("id");
            $menu = Daily_menu::getOne($menu_id);
            if ($menu != null) {
                $menu->delete();
            }
        }
        return $this->redirect("?c=daily_menu");
    }
}