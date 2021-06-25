<?php

namespace App\Repositories;

use App\Entities\AsAttribute;

interface AsAttributeRepository
{
    public function create(AsAttribute $asAttribute): void;
}
