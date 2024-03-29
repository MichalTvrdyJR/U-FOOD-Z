<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\Profile;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator
{
    //const LOGIN = "admin";
    //const PASSWORD_HASH = '$2y$10$GRA8D27bvZZw8b85CAwRee9NH5nj4CQA6PDFMc90pN9Wi4VAWq3yq'; // admin
    //const USERNAME = "Admin";

    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($email, $password): bool
    {
        $data = Profile::getAll();
        foreach ($data as $column) {
            //if ($email == $column->getEmail() && $password == $column->getPassword()) {
            if ($email == $column->getEmail() && password_verify($password, $column->getPassword())) {
                $_SESSION['user'] = $column->getName();
                $_SESSION['id'] = $column->getId();
                return true;
            }
        }
        return false;
    }

    /**
     * Logout the user
     */
    function logout() : void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            if (isset($_SESSION["id"])) {
                unset($_SESSION["id"]);
                session_destroy();
            }
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     */
    function getLoggedUserName(): string
    {

        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null && isset($_SESSION['id']) && $_SESSION['id'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): mixed
    {
        return $_SESSION['id'];
    }
}