<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(){
        $client = new Client(['verify' => false]);
        $response = $client->request("GET","https://fakestoreapi.com/products/categories");
        $categories = json_decode($response->getBody());

        // if (Category::count()){
        //     for($i=0 ;i < count($categories) ;$i++){
        //        dump($i);
        //     }
        // }
        // return $j;
        return response()->json(["categories" => $categories]);
    }

    public function fetchCategories(){
        $client = new Client(['verify' => false]);
        $response = $client->request("GET","https://fakestoreapi.com/products/categories");
        $categories = json_decode($response->getBody());

        return Inertia::render('Admin/Categories',['categories' => $categories]);
    }
}
