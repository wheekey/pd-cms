<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\AsAttribute;
use App\Entities\User;
use App\Repositories\AsAttributeRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class AsAttributesSeeder extends Seeder
{
    public function run(
         AsAttributeRepository $asAttributeRepository
        ): void
    {
        $asAttributeRepository->create(new AsAttribute('Цвет'));
        $asAttributeRepository->create(new AsAttribute('Стиль'));
        $asAttributeRepository->create(new AsAttribute('Рисунок'));
    }
}
