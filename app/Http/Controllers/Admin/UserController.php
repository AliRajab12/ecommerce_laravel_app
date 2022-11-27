<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){
        // $users = User::all();
        return Inertia::render('Admin/Users',['users' => User::all()]);
    }
    public function update(Request $request){
        dd($request->user()->firstName);
        // $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // $request->user()->save();

        // return Redirect::route('admin.users');

    }
    public function destroy($id){

        $result = User::where('id',$id)->delete();
        return redirect()->route('admin.users')->with('message','User deleted successfully');
    }
}
