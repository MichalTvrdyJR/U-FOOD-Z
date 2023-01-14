<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Profile;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit']) && isset($formData['email']) && isset($formData['password'])) {
            $logged = $this->app->getAuth()->login($formData["email"], $formData["password"]);
            if ($logged) {
                return $this->redirect('?c=home');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
        //return $this->redirect('?c=home');
    }

    public function registration() : Response
    {
        //$formData = $this->request()->getPost();
        //$this->app->getAuth()->login($formData['login'], $formData['password']);

        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['create']) && isset($formData['name']) && isset($formData['surname']) && isset($formData['email']) && isset($formData['password']) && isset($formData['check-password']) && isset($formData['phone'])) {
            if (!strpos($formData["email"], "@") || !strpos($formData["email"], ".")) {
                $data = ['message' => 'Email je zle zadaný'];
                return $this->html($data);
            }
            if (!preg_match('/^[0-9]{10}+$/', $formData["phone"])) {
                $data = ['message' => 'Telefón je zle zadaný'];
                return $this->html($data);
            }
            $old_data = Profile::getAll();
            foreach ($old_data as $column) {
                if ($column->getEmail() == $formData["email"]) {
                    $data = ['message' => 'Účet už existuje!'];
                    return $this->html($data);
                }
            }
            if ($formData["password"] == $formData["check-password"]) {
                $profile = new Profile();
                $profile->setName($formData["name"]);
                $profile->setSurname($formData["surname"]);
                $profile->setEmail($formData["email"]);
                $profile->setPassword(password_hash($formData["password"], PASSWORD_DEFAULT));
                //$profile->setPassword($formData["password"]);
                $profile->setPhone($formData["phone"]);
                $profile->save();
                $logged = $this->app->getAuth()->login($formData["email"], $formData["password"]);
                if ($logged) {
                    return $this->redirect('?c=home');
                }
            }
            $data = ['message' => 'Zadané rozdielne heslá!'];
            return $this->html($data);
        }
        $data = ($logged === false ? ['message' => 'Nezadané všetky údaje!'] : []);
        return $this->html($data);
    }
}