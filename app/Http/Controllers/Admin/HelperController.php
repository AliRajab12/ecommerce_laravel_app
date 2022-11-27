<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

use Inertia\Inertia;

class HelperController extends Controller
{
    public function index(){
        $productsCount = Product::count();
        $usersCount = User::count();
        $categoriesCount = Category::count();
        return response()->json('Admin/Users',['productsCount' => $productsCount,
        'usersCount' => $usersCount,
        '$categoriesCount' => $categoriesCount
    ]);
    }

}
