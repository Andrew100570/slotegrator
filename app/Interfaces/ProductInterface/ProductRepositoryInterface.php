<?php
/**
 * Created by PhpStorm.
 * User: andry
 * Date: 18.9.23
 * Time: 2.18
 */

namespace App\Interfaces\ProductInterface;


interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getIzbMoreZeroProducts();
    public function updateIzbrannoeProducts($id);
    public function searchProducts($search);

}
