<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(
         CategoryRepository $categoryRepository,
        ): void
    {
        $categoryRepository->create(new Category('KPB', 969));
        $categoryRepository->create(new Category('Декор (Акс)', 1));
        $categoryRepository->create(new Category('Декор (МАкс)', 5));
        $categoryRepository->create(new Category('Подарки (МАкс)', 3));
    }
}
