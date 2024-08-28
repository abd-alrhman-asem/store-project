<?php

namespace App\Services\Product;

use App\Models\Product;

interface ProductServiceInterface
{
    public function getAllProducts();

    public function createProduct(array $data , $imageFiles);

    public function updateProduct(Product $product, array $data);

    public function deleteProduct(Product $product);

}
