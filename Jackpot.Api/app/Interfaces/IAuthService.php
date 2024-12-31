<?php

namespace App\Interfaces;

interface IAuthService
{
    public function login($data);

    public function logout($user);

    public function updatePassword($user);
}
