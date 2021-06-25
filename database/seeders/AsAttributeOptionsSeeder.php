<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\AsAttributeOption;
use App\Entities\User;
use App\Repositories\AsAttributeOptionRepository;
use App\Repositories\AsAttributeRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class AsAttributeOptionsSeeder extends Seeder
{
    public function run(
         AsAttributeOptionRepository $asAttributeOptionRepository,
        AsAttributeRepository $asAttributeRepository
        ): void
    {
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 1]), 'Красный'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 1]), 'Черный'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 1]), 'Синий'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 2]), 'Disney'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 2]), 'Winx'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 3]), 'Бохо'));
        $asAttributeOptionRepository->create(new AsAttributeOption($asAttributeRepository->findOneBy(['id' => 3]), 'Детский'));

    }
}
