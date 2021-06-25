<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\GroupImage;
use App\Entities\GroupProduct;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\GroupProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class GroupProductsSeeder extends Seeder
{
    public function run(
         GroupProductRepository $groupProductRepository,
         GroupImageRepository $groupImageRepository
        ): void
    {
        $groupProductRepository->create(
            new GroupProduct(
                "gr1",
                "KPB1",
                $groupImageRepository->findOneBy(['id' => 5]))
        );
        $groupProductRepository->create(
            new GroupProduct(
                "gr2",
                             "KPB2",
                $groupImageRepository->findOneBy(['id' => 5]))
        );
        $groupProductRepository->create(
            new GroupProduct(
                "gr3",
                "KPB3",
                $groupImageRepository->findOneBy(['id' => 4])));

    }
}
