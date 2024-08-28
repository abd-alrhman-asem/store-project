<?php

namespace App\Services;

use App\Models\Product;

interface ProductServiceInterface
{
    public function getAllProducts();

    public function createProduct(array $data);

    public function updateProduct(Product $product, array $data);

    public function deleteProduct(Product $product);

}
