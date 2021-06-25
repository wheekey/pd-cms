<?php

namespace App\Repositories;


use App\Entities\GroupProduct;

interface GroupProductRepository
{
    public function findOneBy(array $criteria);
    public function create(GroupProduct $groupProduct): void;
}
