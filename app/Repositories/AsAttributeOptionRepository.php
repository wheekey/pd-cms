<?php

namespace App\Repositories;

use App\Entities\AsAttributeOption;

interface AsAttributeOptionRepository
{
    public function findAllArr(): array;

    public function findAllColorOptions(): array;

    public function findAllStyleOptions(): array;

    public function findAllPictureOptions(): array;

    public function create(AsAttributeOption $asAttributeOption): void;
}
