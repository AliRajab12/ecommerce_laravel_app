<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Product;
use Carbon\Carbon;
use Inertia\Inertia;

class ProductController extends Controller
{
    // protected $productRepoistory;

    // private Client $client;

    // public function __construct()
    // {
    //     // $this->productRepository = $productRepository;
    //     $client = new Client(['verify' => false]);
    // }

    public function index(){
        $client = new Client(['verify' => false]);

        $response = $client->request("GET","https://fakestoreapi.com/products");

        $products = json_decode($response->getBody(),true);

        // if(Product::count() == 0){
        //     foreach($products as $product){
        //         try{
        //         Product::updateOrCreate(
        //                 ['product_id' => $product["id"]],
        //                 [
        //                     'product_id' => $product["id"],
        //                     'title' => $product["title"],
        //                     'price' => $product["price"],
        //                     'description' => $product["description"],
        //                     'category' => $product["category"],
        //                     'image' => $product["image"],
        //                     'rate' => $product["rating"]["rate"],
        //                     'count' => $product["rating"]["count"],
        //                 ],
        //         );
        //     }catch(Exception $e){
        //     }
        //     }
        // }
        // return response()->json(["products" => (Product::count() == 0) ? $products : Product::all() ]);
        return response()->json(["products" =>  $products  ]);

    }

    public function fetchProducts(){

        return Inertia::render('Admin/Products',['products' => Product::all()]);
    }


    public function showProductDetails($id){
            return Inertia::render('Product/Details',['product' => Product::where('product_id',$id)->first()]);
        }


    public function showProductByCategory($category){

        $client = new Client(['verify' => false]);

        $response = $client->request("GET","https://fakestoreapi.com/products/category/".$category);

        $products = json_decode($response->getBody());
        return Inertia::render('Product/ByCategory',['products' => $products]);
    }

    public function destroy($id){
        $product = Product::where('product_id',$id)->delete();

        return redirect()->route('admin.products')->with('message','Product deleted successfully');
    }

    }

