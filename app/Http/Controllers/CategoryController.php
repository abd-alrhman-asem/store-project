<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected  CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAll();
        return success($categories);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param StoreCategoryRequest $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $imageFiles = $request->file('images', []);
        $category = $this->categoryService->create($request->validated() , $imageFiles);
        return resourceCreatedResponse(" category created successfully ",$category);
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return success($category->load('children', 'products'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $updatedCategory = $this->categoryService->update($category, $request->validated());
        return success($updatedCategory , "category updated successfully");
    }

    /**
     * Remove the specified category from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $this->categoryService->delete($category);
        return success(msg:"category deleted successfully");
    }
}
