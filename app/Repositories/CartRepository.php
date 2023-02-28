<?php 


namespace App\Repositories;

use App\Models\Product;

interface CartRepository {
    

    public function get();
    public function add(Product $product, $quantity = 1,$variationValue);
    public function update($id, $quantity,$variationValue );
    public function delete($id);
    public function empty();
    public function total();
    // public function addVariation(Product $product, $quantity = 1, $variationValues);

}