<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(
         UserRepository $userRepository,
        ): void
    {
        $userRepository->create(new User('user', 'ermakov@p.ru', bcrypt('123')));
    }
}
