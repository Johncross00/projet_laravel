<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='user')
            {
                $products = Product::latest()->paginate(10);
    
                return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);            }

            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }

            else if($usertype=='editor')
            {   $products = Product::orderBy('created_at', 'desc')->get();
                return view('editor.editorhome', ['products' => $products]);
            }
            
            else
            {
                return redirect()->back();
            }
    }
}
                
    // public function adminHome(){
    //     return view('admin-home');
    // }
    
}
