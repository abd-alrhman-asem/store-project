<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Traits\FileManager;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService implements CategoryServiceInterface
{
    use FileManager;
    /**
     * Get all categories.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::whereNull('category_id')->with('Children', 'products')->get();
    }

    /**
     * Create a new category.
     *
     * @param array $data
     * @return Category
     * @throws Exception
     */
    public function create(array $data , $imageFiles): Category
    {
        if ( !$category = Category::create($data)) {
            throw new Exception('the category could not be created');
        }
        // Handle image uploads
        if (!empty($imageFiles)) {
            $this->morphUploadImages($category,'images' , $imageFiles , "categories");
        }
        return $category;
    }

    /**
     * Update an existing category.
     *
     * @param Category $category
     * @param array $data
     * @return Category
     * @throws Exception
     */
    public function update(Category $category, array $data): Category
    {
        if (!$category->update($data))
            throw new Exception('the category could not be updated');
        return $category;
    }

    /**
     * Delete a category.
     *
     * @param Category $category
     * @return void
     * @throws Exception
     */
    public function delete(Category $category): void
    {
        if (!$category->delete()) {
            throw new Exception('the category could not be deleted');
        }
    }

}
