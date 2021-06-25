<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ManufacturerRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

use App\Entities\Manufacturer;

class ManufacturersSeeder extends Seeder
{
    public function run(
         ManufacturerRepository $manufacturerRepository,
        ): void
    {
        $manufacturerRepository->create(new Manufacturer('manName', 969));
    }
}
