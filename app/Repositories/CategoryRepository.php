<?php

namespace App\Repositories;

use App\Entities\Category;

interface CategoryRepository
{


    public function update(Category $category, string $attrSetName);

    public function insert(int $attributeSetId, string $attrSetName);

    public function insertOrUpdate(int $attributeSetId, string $attrSetName);

    public function getCatIds(): array;

    public function deleteOldCats(array $catIds);

    public function findAllArr(): array;

    public function create(Category $category): void;

    public function findDecorCats(): array;

}
