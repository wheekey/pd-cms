<?php

namespace App\Repositories;

use App\Common\UserData;
use App\Entities\User;

interface UserRepository
{


    public function update(UserData $userData);

    public function create(User $user): void;
}
