<?php

use App\Data\UserDTO;

class UserService implements UserSeviceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }
        if (null !== $this->userRepository->findOneUsername($userDTO->getUsername())) {
            return false;
        }

    }
}
