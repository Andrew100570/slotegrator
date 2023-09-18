<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ProductInterface\ProductRepositoryInterface;

class ProductsController extends Controller
{

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function index()
    {
        $auth = Auth::user();

        $products = $this->productRepository->getAllProducts();

        return view('products.products', ['products' => $products,'auth' => $auth]);
    }

    public function add(Request $request)
    {

        $auth = Auth::user();

        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        if($request->file('image_url')) {
            foreach ($request->file('image_url') as $file) {
                $file->move(storage_path('app/files'), $file->getClientOriginalName());
                //Storage::disk('s3')->put(storage_path('app/files'),$file->getClientOriginalName());
                //Save for AWS S3
                $path = Storage::disk('s3')->put('images', $file->getClientOriginalName());

                $path[] = storage_path('app/files') . '/' . $file->getClientOriginalName();
            }
        } else {
            $path = '';
        }
        $product->image_url = json_encode($path);
        $product->save();

        $products = $this->productRepository->getAllProducts();

        return view('products.products', ['products' => $products,'auth' => $auth]);
    }

    public function view_izbrannoe()
    {
        $redis = Redis::connection();
        $word = $redis->get('search');

        $search = isset($word) ? $redis->get('search') : '';
        $products = $this->productRepository->getIzbMoreZeroProducts();

        return view('izbrannoe.izbrannoe', ['search' => $search,'products' => $products]);
    }


    public function add_izbrannoe(Request $request)
    {
        $this->productRepository->updateIzbrannoeProducts($request->get('izbrannoe'));

        $products = $this->productRepository->getIzbMoreZeroProducts();
        return view('izbrannoe.izbrannoe', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = $this->productRepository->searchProducts($search);

        $redis = Redis::connection();

        $redis->set('search', $products);

        return view('izbrannoe.izbrannoe', ['products' => $products]);
    }


}
