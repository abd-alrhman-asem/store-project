<?php

namespace App\Services\Category;

use App\Models\Category;

interface CategoryServiceInterface
{

    public function getAll();

    public function create(array $data , $imageFiles);

    public function update(Category $category, array $data);

    public function delete(Category $category);
}
