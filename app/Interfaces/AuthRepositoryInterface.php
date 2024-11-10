<?php

namespace App\Interfaces;

Interface AuthRepositoryInterface
{
    public function register(array $data);

    public function login(array $data);

    public function logout();
}
