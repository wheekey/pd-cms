<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\Supplier;
use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    public function run(
         SupplierRepository $supplierRepository,
        ): void
    {

        $supplierRepository->create(new Supplier(postavshik: 123,
                                                 postavshikValue: 'Supplier1',
                                                 isVisible: true,
                                                 hasNewProducts: false));
    }
}
