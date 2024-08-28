<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Collection;


class ProductService implements ProductServiceInterface
{
    /**
     * Get all products with 'created_from' column.
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    /**
     * Update an existing product.
     *
     * @param Product $product
     * @param array $data
     * @return Product|null
     * @throws Exception
     */
    public function updateProduct(Product $product, array $data): ?Product
    {
        if (!$product->update($data))
            throw new Exception('the product could not be created');
        return $product;
    }

    /**
     * Create a new product.
     *
     * @param mixed $data
     * @return Product
     * @throws Exception
     */
    public function createProduct(array $data): Product
    {
        if (!$product = Product::create($data))
            throw new Exception('the product could not be created');
        return $product;
    }

    /**
     * Delete a product by ID.
     *
     * @param $product
     * return void
     * @throws Exception
     */
    public function deleteProduct($product): void
    {
        if (!$product->delete()) {
            throw new Exception(' the delete operation failed , please try again');
        }
    }
}
