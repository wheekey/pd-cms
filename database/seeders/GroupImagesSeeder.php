<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\GroupImage;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class GroupImagesSeeder extends Seeder
{
    public function run(
         GroupImageRepository $groupImageRepository,
        ): void
    {
        $groupImageRepository->create(new GroupImage());
        $groupImageRepository->create(new GroupImage());
        $groupImageRepository->create(new GroupImage());
        $groupImageRepository->create(new GroupImage());
        $groupImageRepository->create(new GroupImage());
    }
}
