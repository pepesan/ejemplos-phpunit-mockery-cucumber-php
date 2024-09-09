<?php

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }
}

