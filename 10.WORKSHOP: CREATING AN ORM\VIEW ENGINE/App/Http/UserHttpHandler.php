<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends UserHttpHandlerAbstract
{
    public function all(UserServiceInterface $userService)
    {
        $this->render("users/all", $userService->getAll());
    }

    public function login(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            $this->render("users/login");
        }
    }

    public function profile(UserServiceInterface $userService, array $formData = [])
    {
        if (!$userService->isLogged()) {
            $this->redirect("login.php");
        }

        $currentUser = $userService->currentUser();

        if (isset($formData['edit'])) {
            $this->handleEditProcess($userService, $formData);
        } else {
            $this->render("users/profile", $currentUser);
        }
    }

    public function register(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    private function handleRegisterProcess(UserServiceInterface $userService, array $formData)
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        /**
         * @var UserServiceInterface $userService
         */
        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect("login.php");
        } else {
            $this->render("users/register", null,
                new ErrorDTO("Password mismatch."));
        }
    }

    private function handleLoginProcess($userService, $formData)
    {
        $username = $formData['username'];
        $password = $formData['password'];

        /**
         * @var UserServiceInterface $userService
         */
        $user = $userService->login($username, $password);

        if (null !== $user) {
            $_SESSION['id'] = $user->getId();
            $this->redirect("profile.php");
            exit;
        } else {
            $this->render("users/login", null,
                new ErrorDTO("Username does not exist or password mismatch."));
        }
    }

    private function handleEditProcess(UserServiceInterface $userService, array $formData)
    {
        /** @var UserServiceInterface $userService */
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        if($userService->edit($user)) {
            $this->redirect("profile.php");
        } else {
            $this->render("users/profile", null,
                new ErrorDTO("Username already exists."));
        }
    }

    public function index()
    {
        $this->render("home/index");
    }
}
