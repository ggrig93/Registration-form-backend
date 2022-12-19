<?php

namespace App\Interfaces\User;

use App\Dto\UserDto;

interface UserServiceInterface
{
    public function create(UserDto $user);
}
