<?php
/**
 * Created by PhpStorm.
 * User: andry
 * Date: 18.9.23
 * Time: 0.54
 */

namespace App\Repository;

use App\Models\Market\Product;
use App\Interfaces\ProductInterface\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getIzbMoreZeroProducts()
    {
        return Product::where('izbrannoe','>',0)->get();
    }

    public function updateIzbrannoeProducts($id)
    {
        return  DB::table('products')
            ->where('id', $id)
            ->update(['izbrannoe' => 1]);
    }

    public function searchProducts($search)
    {
        return Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();
    }

}
