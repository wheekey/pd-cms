<?php

namespace App\Repositories\CategorySetter;



use App\Entities\CategorySetter\ProductCategoryRelation;

interface ProductCategoryRelationRepository
{
    public function create(ProductCategoryRelation $productCategoryRelation): void;
}
