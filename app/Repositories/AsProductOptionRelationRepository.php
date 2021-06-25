<?php

namespace App\Repositories;

use App\Entities\AsProductOptionRelation;

interface AsProductOptionRelationRepository
{
    public function save(int $optionId, int $productId);
    public function delete(int $optionId, int $productId);
    public function isExistRelation(int $optionId, int $productId);
    public function formReport();
    public function create(AsProductOptionRelation $asProductOptionRelation): void;
}
